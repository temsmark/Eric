@extends('layouts.master')
@section('content')


    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-th-list"></i> Patient Data</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb side">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active"><a href="#">Data Table</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        @if(Session::has('message'))
                            <div class="alert alert-info" id="alert">
                                {{Session::get('message')}}                            </div>
                        @endif
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Telephone</th>
                                <th>Age</th>
                                <th>Status</th>
                                <th>Ailment</th>
                                <th></th>


                            </tr>
                            </thead>
                            <tbody>
                            @foreach($patients as $patient)
                                <tr>
                                    <td>{{$patient->patient->name}}</td>
                                    <td>{{$patient->patient->tel}}</td>
                                    <td>{{$patient->patient->age}}</td>
                                    <td>{{$patient->disease->specialty_name}}</td>
                                    <td>{{$patient->comment}}</td>
                                    <td>
                                        <a href="#" class="btn btn-info" role="button">Accept</a>
                                        </td>
                                    <td>

                                        <a href="#" class="btn btn-info danger" role="button">Decline</a>

                                    </td>


                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </main>

@stop
@section('script')
    <script type="text/javascript" src="{{asset('valijs/plugins/jquery.dataTables.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('valijs/plugins/dataTables.bootstrap.min.js')}}"></script>
    <script type="text/javascript">$('#sampleTable').DataTable();</script>
    <script>
        setTimeout(function () {
            $('#alert').hide()
        },4000)
    </script>
@stop
