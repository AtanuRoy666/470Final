@extends('layout')
@section('title', 'View Departments')
@section('content')
<div class="card mb-4 mt-5">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        View Department
        <a href="{{url('depart')}}" class='float-end btn btn-sm btn-success'>View All</a>
    </div>
    <div class="card-body">


        <table class='table table-bordered'>
            <tr>
                <!-- <th>Title</th>
                <td>
                    {{$data->title}}
                </td> -->
                <!-- <th>Full Name</th>
                <th>Address</th>
                <th>Mobile</th> -->
            </tr>

            
        </table>
        
    </div>
</div>




@endsection