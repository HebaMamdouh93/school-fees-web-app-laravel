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
                    <form method="post" action="/insert" >
                      {{csrf_field()}}
                        <div class="form-group ">
                                <label><Strong > School: </Strong> {{$school}}</label>
                         </div>

                        <div class="form-group ">
                                <label><Strong > Year: </Strong>{{$year}}</label>
                         </div>
                            <div class="form-group">
                                <table  class="table table-hover table-condensed" style="width:100%">

                                <thead>

                                    <tr>
                                        <th>Grade</th>
                                        @foreach ($fees as $fee)
                                            <th>{{ $fee->fee_type }}</th>
                                        @endforeach
                                    </tr>
                                    
                                </thead>
                                <tbody>
                                <?php $k=0 ?>
                                    @for ($i = 0; $i < count($grades); $i++)
                                        <tr>
                                            <td>{{$grades[$i]->name}}</td>
                                            
                                            @for ($j = 0; $j < count($fees); $j++) 
                                            <td>
                                          
                                            @if(count($fees_data)!=0 && $k != count($fees_data)  )
                                                <input type="number" min="0" class="form-control"  name="fee_values[{{$grades[$i]->id}}][{{$fees[$j]->id}}]" value="{{$fees_data[$k]->pivot->fee_value}}" />
                                                <?php $k++ ;?>  
                                            @else
                                                <input type="number" min="0" class="form-control"  name="fee_values[{{$grades[$i]->id}}][{{$fees[$j]->id}}]"  placeholder="Enter Fee value"/>
                                            @endif
                                            </td>
                                           
                                            @endfor
                                            
                                        </tr>
                                    @endfor
                                </tbody>

                                </table>
                            </div>

               



<br>
<input type="submit" value="Save" class="btn btn-success">
<a href="/insert" class="btn btn-dark">Cancel</a>
</div>

        


</form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
