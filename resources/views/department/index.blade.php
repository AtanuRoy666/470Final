@extends('layout')
@section('title', 'All Departments')
@section('content')
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Departments
                                <a href="{{url('depart/create')}}" class='float-end btn btn-sm btn-success'>Add New</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class='table table-border'>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($data)
                                            @foreach($data as $d)
                                            <tr>
                                                <td>{{$d->id}}</td>
                                                <td>{{$d->title}}</td>
                                                <td>
                                                    <!-- <a href="{{url('depart/'.$d->id)}}" class="btn btn-sm btn-warning">Show</a> -->
                                                    <a href="{{url('depart/'.$d->id.'/edit')}}" class="btn btn-sm btn-info">Update</a>
                                                    <a onclick='return confirm("You are about to delete this data. Proceed?")' 
                                                    href="{{url('depart/'.$d->id.'/delete')}}" class="btn btn-sm btn-danger">Delete</a>
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