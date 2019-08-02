@extends('layouts.master')
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> Home</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Home</a></li>
            </ul>
        </div>





        <div class="row">
            <div class="col-md-5">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Add Doctor/Specialist</h3>
                    </div>
                    <div class="tile-body">
@if(Session::has('message'))
                            <div class="alert alert-info" id="alert">
{{Session::get('message')}}                            </div>
    @endif
    @if(Session::has('error'))
        <div class="alert alert-info" id="alert">
            {{Session::get('error')}}                            </div>
    @endif

                        <form method="post" action="{{action('AdminController@store')}}">
                            @csrf
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input class="form-control" name="name" type="text" placeholder="Enter full name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <input class="form-control" type="email" name="email" placeholder="Enter email address" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Telephone</label>
                                <input class="form-control" type="tel" name="tel" placeholder="Telephone" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <input class="form-control" type="password" name="password" placeholder="Password" required>
                            </div>
                          <div class="form-group">
                              <label class="control-label">Role</label>

                              <select name="role_id" id="">
                                  <option value="2">Doctor</option>
                                  <option value="3">Specialist</option>

                              </select>
                          </div>
                            <div class="form-group">
                                <label class="control-label">Specialty</label>

                                <select name="specialty" id="">
@foreach($specialties as$specialty)
                                        <option value="{{$specialty->id}}">{{$specialty->specialty_name}}</option>
    @endforeach

                                </select>
                            </div>
                          <button type="submit" class="btn  btn-primary">Register</button>
                        </form>


                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="tile">
                    <div class="tile-title-w-btn">
                        <h3 class="title">Existing Users</h3>
                    </div>
                    <div class="tile-body">
                        @if(Session::has('delete'))
                            <div class="alert alert-success text-center" id="alert">
                                {{Session::get('delete')}}                            </div>
                        @endif

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Speciality</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1?>
                                    @foreach($users as $user)
                                        <tr>

                                        <td>{{$i++}}</td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->role->role_name}}</td>
                                    <td>
                                        {{$user->master['specialty_name']}}

                                    </td>
                                    <td> <a href="#" class="btn btn-info" role="button">Edit</a></td>
                                    <td>
                                        @if (Auth::User()->role_id==1)
                                            @else
                                            <a href="{{url('user',$user->id)}}" class="btn btn-danger" role="button">Delete</a></td>

                                            @endif

                                        </tr>

                                    @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>

@stop
@section('script')
    <script>
        setTimeout(function () {
            $('#alert').hide();
        },4000)
    </script>
@stop