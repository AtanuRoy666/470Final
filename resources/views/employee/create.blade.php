@extends('layout')
@section('title', 'Add Employee')
@section('content')
<div class="card mb-4 mt-5">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Add Employee
        <a href="{{url('employee')}}" class='float-end btn btn-sm btn-success'>View All</a>
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
        <form action="{{url('employee')}}" method="post" enctype='multipart/form-data'>
            @csrf
            <table class='table table-bordered'>
                <tr>
                    <th>Department</th>
                    <td>
                        <select name="depart" id="" class='form-control'>
                            <option value="">-- Select Department --</option>
                            @foreach($departments as $depart)
                                <option value="{{$depart->id}}">{{$depart->title}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>
                        <input type="text" name="full_name" class='form-control'>
                    </td>
                </tr>
                <!-- <tr>
                    <th>Photo</th>
                    <td>
                        <input type="file" name="photo" class='form-control'>
                    </td>
                </tr> -->
                <tr>
                    <th>Address</th>
                    <td>
                        <input type="text" name="address" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>
                        <input type="text" name="mobile" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <input type="text" name="email" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <input type="radio" name="status" value='1' > Active 
                        <br>
                        <input type="radio" name="status" value='0' > On Leave 
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