<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Member;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Member::orderBy('id', 'asc')->get();
        return view('member.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Department::orderBy('id', 'asc')->get();
        return view('member.create', ['departments'=>$data]);
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
            'full_name'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'email'=>'required'
            // 'payment_status'=>'required'
        ]);

        $data=new Member();
        $data->full_name=$request->full_name;
        $data->address=$request->address;
        $data->mobile=$request->mobile;
        $data->email=$request->email;
        // $data->payment_status=$request->payment_status;
        $data->save();

        return redirect('member/create')->with('msg', 'Member added');
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Member::find($id);
        return view('member.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
        $data=Member::find($id);
        return view('member.edit', ['data'=>$data]);
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
            'full_name'=>'required',
            'address'=>'required',
            'mobile'=>'required',
            'email'=>'required'
            // 'payment_status'=>'required'
        ]);

        $data=Member::find($id);
        $data->full_name=$request->full_name;
        $data->address=$request->address;
        $data->mobile=$request->mobile;
        $data->email=$request->email;
        // $data->payment_status=$request->payment_status;
        $data->save();
        return redirect('member/'.$id.'/edit')->with('msg', 'Member updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::where('id', $id)->delete();
        return redirect('member');
    }
}
