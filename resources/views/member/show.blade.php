@extends('layout')
@section('title', 'Member Details')
@section('content')
<div class="card mb-4 mt-5">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Member Details
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
                    <th>Member ID</th>
                    <td>
                        {{$data->id}}
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
                        {{$data->email}}
                    </td>
                </tr>
                
                
            </table>
        </form>
    </div>
</div>




@endsection