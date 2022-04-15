@extends('layout')
@section('title', 'Add New Member')
@section('content')
<div class="card mb-4 mt-5">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Add New Member
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
        <form action="{{url('member')}}" method="post" enctype='multipart/form-data'>
            @csrf
            <table class='table table-bordered'>
                <tr>
                    <th>Full Name</th>
                    <td>
                        <input type="text" name="full_name" class='form-control'>
                    </td>
                </tr>
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
                    <th>Payment Status</th>
                    <td>
                        <input type="radio" name="payment_status" value='1' > Paid 
                        <br>
                        <input type="radio" name="payment_status" value='0' > Pending 
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