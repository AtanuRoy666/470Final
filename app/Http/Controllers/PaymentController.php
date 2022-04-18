<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=Payment::orderBy('id', 'desc')->get();
        return view('payment.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data=Payment::orderBy('id', 'desc')->get();
        return view('payment.create', ['payments'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $table->string('mem_id');
        // $table->string('full_name');
        // $table->string('payment_status');
        $request->validate([
            'mem_id'=>'required',
            'full_name'=>'required',
            'payment_status'=>'required'
        ]);

        $data=new Payment();
        $data->mem_id=$request->mem_id;
        $data->full_name=$request->full_name;
        $data->payment_status=$request->payment_status;
        $data->save();

        return redirect('payment/create')->with('msg', 'Payment Complete');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Payment::find($id);
        return view('payment.show',['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Payment::where('id', $id)->delete();
        return redirect('payment');
    }
}
