@extends('layout')
@section('title', 'All Payments')
@section('content')
<div class="card mb-4 mt-5">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                All Payments
                                <a href="{{url('payment/create')}}" class='float-end btn btn-sm btn-success'>New Payment</a>
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple" class='table table-border'>
                                    <thead>
                                        <tr>
                                            <th>Payment ID</th>
                                            <th>Member ID</th>
                                            <th>Full Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Payment ID</th>
                                            <th>Member ID</th>
                                            <th>Full Name</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @if($data)
                                            @foreach($data as $d)
                                            <tr>
                                                <td>{{$d->id}}</td>
                                                <td>{{$d->mem_id}}</td>
                                                <td>{{$d->full_name}}</td>
                                                <td>{{$d->payment_status}}</td>
                                                <td>{{date_format($d->created_at,'d M Y')}}</td>
                                                <td>
                                                    <!-- <a href="{{url('member/'.$d->id)}}" class="btn btn-sm btn-warning">Show</a>
                                                    <a href="{{url('member/'.$d->id.'/edit')}}" class="btn btn-sm btn-info">Update</a> -->
                                                    <a onclick='return confirm("You are about to delete this data. Proceed?")' 
                                                    href="{{url('member/'.$d->id.'/delete')}}" class="btn btn-sm btn-danger">Delete</a>
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