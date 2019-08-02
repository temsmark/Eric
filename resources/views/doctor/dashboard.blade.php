@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa fa-user-md"></i> Hello Doctor {{ Auth::User()->name??'' }}</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Doctor</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <div class="col-sm-12">
                        <h3>Add Patient Into the System</h3>
                        <form method="post" action="{{action('DoctorController@store')}}" >
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input class="form-control" name="name" type="text" placeholder="Enter full name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Telephone</label>
                                <input class="form-control" type="tel" name="tel" placeholder="Telephone" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Age</label>
                                <input class="form-control" type="text" name="age"  required>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Ailment</label>

                                <select name="specialty_id" >
                                    @foreach($specialties as $specialty)
                                        <option value="{{$specialty->id}}">{{$specialty->specialty_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <button type="submit" class="btn  btn-primary">Register</button>

                        </form>

                    </div>

                </div>
            </div>
        </div>
    </main>



@stop
@section('script')

@stop