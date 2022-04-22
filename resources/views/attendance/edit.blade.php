@extends('layout')
@section('title', 'Update Attendance')
@section('content')
<div class="card mb-4 mt-5">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Update Attandance
        <a href="{{url('attendance')}}" class='float-end btn btn-sm btn-success'>View All</a>
    </div>
    <div class="card-body">

        @if($errors->any())
            @foreach($errors->all() as $error)
            <p class="text-danger">{{$error}}</p>
            @endforeach
        @endif
       
        @if(Session::has('msg'))
        <p class="text-success">{{session('msg')}}</p>
        @endif
        <form action="{{url('attendance/'.$data->id)}}" method="post" enctype='multipart/form-data'>
            @method('put')
            @csrf
            
            <table class='table table-bordered'>
                
                <tr>
                    <th>mem_id</th>
                    <td>
                        <input type="text" value="{{$data->mem_id}}" name="mem_id" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>
                        <input type="text" value="{{$data->full_name}}" name="full_name" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Assigned Locker</th>
                    <td>
                        <input type="text" value="{{$data->locker}}" name="locker" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Check-In Time</th>
                    <td>
                        <input type="text" value="{{$data->checkIn}}" name="checkIn" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Check-Out Time</th>
                    <td>
                        <input type="text" value="{{$data->checkOut}}" name="checkOut" class='form-control'>
                    </td>
                </tr>

                <tr>
                    <td colspan='2'>
                        <input type="submit" value='Submit' class='btn btn-primary'>
                    </td>
                </tr>
            </table>
        </form>
    </div>
</div>




@endsection