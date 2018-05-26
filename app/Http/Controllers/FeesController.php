<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Year;
use App\Grade;
use App\Fee;
use App\Fee_grade;
use Session;

use App\Http\Requests\StoreFeeRequest;
class FeesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function insert()
    {
        $schools=School::All();
        $years=Year::All();
       
        return view('insert',[
            'schools' => $schools,
            'years'   => $years,
            
        ]);
    }

    public function store_insert(Request $request){
        $school_id=$request->school_id;
        session(['school_id' => $school_id]);
        $year_id=$request->year_id; 
        session(['year_id' => $year_id]);
        return redirect(route('insert_page'));  
    }
    public function index()
    {
        $school_id= session('school_id');
        $school=School::findOrFail($school_id);
        $year_id=session('year_id');
        $year=Year::findOrFail($year_id);
        $fees=Fee::All();
        $grades=Grade::All();
        $fees_data =$school->fees->where('pivot.year_id','=',$year_id);
//dd($fees_data[0]->pivot->grade_id);
        return view('home',[
            'school' => $school->name,
            'year'   => $year->year,
            'fees' => $fees,
            'grades' => $grades,
            'fees_data' => $fees_data
        ]);
    }
    public function store(Request $request)
    {
        $school_id= session('school_id');
        $year_id=session('year_id');
        foreach($request->fee_values as $grade_id => $value){
            $grade=Grade::findOrFail($grade_id);
            foreach($value as $fee_id => $fee_value){
                    if($fee_value == null)
                    {
                        $fee_value=0;
                    }
                   $row=Fee_grade::where('school_id','=',$school_id)->where('year_id','=',$year_id)->where('fee_id','=',$fee_id)->where('grade_id','=',$grade_id)->first();
                  if($row){
                    $row->fee_value=$fee_value;
                    $row->save();
                  }else{
                   $grade->fees()->attach($fee_id, ['school_id' => $school_id, 'year_id' => $year_id,'fee_value' => $fee_value]);
                  }
            }

        }
        Session::flash('message', 'Data Saved Successfully'); 
        Session::flash('alert-class', 'alert-info'); 
        return redirect(route('home_page')); 
    }

   




}
