@extends('layout')
@section('title', 'Update Member Info')
@section('content')
<div class="card mb-4 mt-5">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Update Member Info
        <a href="{{url('member')}}" class='float-end btn btn-sm btn-success'>View All</a>
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
        <form action="{{url('member/'.$data->id)}}" method="post" enctype='multipart/form-data'>
            @method('put')
            @csrf
            
            <table class='table table-bordered'>
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
                <!-- <tr>
                    <th>Payment Status</th>
                    <td>
                        <select name="payment_status" id="" class='form-control'>
                            <option value="{{$data->payment_status}}">{{$data->payment_status}}</option>
                            
                            <option class="btn btn-success" value="Paid" name="payment_status">Paid</option>
                            <option class="btn btn-danger" value="Unpaid" name="payment_status">Pending</option>
                            
                        </select>
                    </td>
                </tr> -->
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