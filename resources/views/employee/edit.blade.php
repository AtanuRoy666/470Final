@extends('layout')
@section('title', 'Update Employee')
@section('content')
<div class="card mb-4 mt-5">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Update Employee
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
        <form action="{{url('employee/'.$data->id)}}" method="post" enctype='multipart/form-data'>
            @method('put')
            @csrf
            
            <table class='table table-bordered'>
                <tr>
                    <th>Department</th>
                    <td>
                        <select name="depart" id="" class='form-control'>
                            <option value="">-- Select Department --</option>
                            @foreach($departs as $depart)
                                <option @if($depart->id == $data->department_id) selected @endif 
                                value="{{$depart->id}}">{{$depart->title}}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>
                        <input type="text" value="{{$data->full_name}}" name="full_name" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        <input type="text" value="{{$data->address}}" name="address" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>
                        <input type="text" value="{{$data->mobile}}" name="mobile" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        <input type="text" value="{{$data->email}}" name="email" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        <input @if($data->status==1) checked @endif type="radio" value="{{$data->status}}" name="status" value='1' > Activate 
                        <br>
                        <input @if($data->status==0) checked @endif type="radio" name="status" value='0' > Deactivate 
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