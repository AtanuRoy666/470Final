<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Attendance::orderBy('id', 'desc')->get();
        return view('attendance.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Attendance::orderBy('id', 'asc')->get();
        return view('attendance.create', ['departments'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'mem_id'=>'required',
            'full_name'=>'required',
            'locker'=>'required',
            'checkIn'=>'required',

        ]);

        $data=new Attendance();
        $data->mem_id=$request->mem_id;
        $data->full_name=$request->full_name;
        $data->locker=$request->locker;
        $data->checkIn=$request->checkIn;
        $data->checkOut=$request->checkOut;
        $data->save();

        return redirect('attendance/create')->with('msg', 'Attendance stored');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Attendance::find($id);
        return view('attendance.edit', ['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'mem_id'=>'required',
            'full_name'=>'required',
            'locker'=>'required',
            'checkIn'=>'required',
            'checkOut'=>'required'
        ]);

        $data=Attendance::find($id);
        $data->mem_id=$request->mem_id;
        $data->full_name=$request->full_name;
        $data->locker=$request->locker;
        $data->checkIn=$request->checkIn;
        $data->checkOut=$request->checkOut;
        $data->save();

        return redirect('attendance/'.$id.'/edit')->with('msg', 'Attendance updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Attendance::where('id', $id)->delete();
        return redirect('attendance');
    }
}
