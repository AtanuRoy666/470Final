@extends('layout')
@section('title', 'Employee Details')
@section('content')
<div class="card mb-4 mt-5">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Employee Details
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
                        {{$data->department->title}}
                    </td>
                </tr>
                <tr>
                    <th>Full Name</th>
                    <td>
                        {{$data->full_name}}
                    </td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>
                        {{$data->address}}
                    </td>
                </tr>
                <tr>
                    <th>Mobile</th>
                    <td>
                        {{$data->mobile}}
                    </td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>
                        {{$data->email}}>
                    </td>
                </tr>
                <tr>
                    <th>Status</th>
                    <td>
                        @if($data->status==1) Active @else On leave @endif  
                    </td>
                    
                </tr>
                
            </table>
        </form>
    </div>
</div>




@endsection