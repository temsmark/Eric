@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-star"></i> Refer</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Refer</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <div class="col-sm-12">
@foreach($patient as$one)
                       <form method="post" action="{{action('DoctorController@refers')}}" >
                        @csrf
                        <div class="form-group">
                            <label class="control-label">Name</label>
                            <input class="form-control" value="{{$one->name}}" type="text" placeholder="Enter full name"  disabled>
                            <input type="text" value="{{$one->id}}" name="patient_id" hidden>
                        </div>
                           
                           
                           <div class="form-group">
                               <label class="control-label">Disease</label>

                               <select name="disease" >
                                   @foreach($specialists as $specialist)
                                       <option value="{{$specialist->id}}"> {{$specialist->specialty_name}}</option>
                                       @endforeach
                               </select>
                           </div>

                           @if(count($users)<=0)

                                   <span class="badge badge-danger">No specialist found</span>
                                   @else
                               <div class="form-group">

                               <label class="control-label">Specialist</label>

                               <select name="specialist_id" >
                                   @foreach($users as $user)
                                       <option value="{{$user->id}}"> {{$user->name}}</option>
                                   @endforeach
                               </select>
                           </div>
                           @endif

                           <div class="form-group">
                            <label class="control-label">Comment</label>
                            <textarea class="form-control" name="comment" id="" cols="30" rows="10" required>

                            </textarea>
                        </div>

                           @if(count($users)<=0)

                               <a href="#" class="btn btn-info disabled" type="submit" role="button">Refer</a>
                           @else
                               <button type="submit" class="btn  btn-primary">Refer</button>

                           @endif


                        </form>
    @endforeach
                    </div>
                </div>
            </div>
        </div>
    </main>
@stop