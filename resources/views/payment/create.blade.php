@extends('layout')
@section('title', 'New Payment')
@section('content')
<div class="card mb-4 mt-5">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        New Payment
        <a href="{{url('payment')}}" class='float-end btn btn-sm btn-success'>View All</a>
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
        <form action="{{url('payment')}}" method="post" enctype='multipart/form-data'>
            @csrf
            <table class='table table-bordered'>
                <tr>
                    <th>Member ID</th>
                    <td>
                        <input type="text" name="mem_id" class='form-control'>
                    </td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>
                        <input type="text" name="full_name" class='form-control'>
                    </td>
                </tr>
                
                <tr>
                    <th>Payment Status</th>
                    <td>
                        <input type="radio" name="payment_status" value='Paid' > Paid 
                        <br>
                        <input type="radio" name="payment_status" value='Pending' > Pending 
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