@extends('layout')
@section('title', 'All Employees')
@section('content')
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Employees
                                <a href="{{url('employee/create')}}" class='float-end btn btn-sm btn-success'>Add New</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class='table table-border'>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Department</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Department</th>
                                            <th>Full Name</th>
                                            <th>Address</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($data)
                                            @foreach($data as $d)
                                            <tr>
                                                <td>{{$d->id}}</td>
                                                <td>{{$d->department->title}}</td>
                                                <td>{{$d->full_name}}</td>
                                                <td>{{$d->address}}</td>
                                                <td>
                                                    <a href="{{url('employee/'.$d->id)}}" class="btn btn-sm btn-warning">Show</a>
                                                    <a href="{{url('employee/'.$d->id.'/edit')}}" class="btn btn-sm btn-info">Update</a>
                                                    <a onclick='return confirm("You are about to delete this data. Proceed?")' 
                                                    href="{{url('employee/'.$d->id.'/delete')}}" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="{{asset('public')}}/js/scripts.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="{{asset('public')}}/js/datatables-simple-demo.js"></script>

@endsection