@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Insert Fees For Each Grade</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @if(Session::has('message'))
                    <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="post"  >
                      {{csrf_field()}}
                        <div class="form-group ">
                                <label>Schools:</label>
                              
                                 
                                <select class="form-control" name="school_id">
                                    <option>Select School</option>
                                    @foreach ($schools as $school)
                                        <option value="{{$school->id}}">{{$school->name}}</option>
                                    @endforeach

                                </select>
                                   
                               
                         </div>

                        <div class="form-group ">
                                <label>Years:</label>
                               
                                 
                                <select class="form-control" name="year_id">
                                    <option>Select Year</option>
                                    @foreach ($years as $year)
                                        <option value="{{$year->id}}">{{$year->year}}</option>
                                    @endforeach

                                </select>
                                   
                               
                         </div>
                          

<br>
<input type="submit" value="Save" class="btn btn-success">
<a href="/home" class="btn btn-dark">Cancel</a>
</div>

        


</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
