<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Member;
use Carbon\carbon;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //Dashboard
    public function index(Request $r){
        
        $data1=Employee::select('id', 'created_at')->get()->groupBy(function($data1){
            return Carbon::parse($data1->created_at)->format('M');
        });
        $data2=Member::select('id', 'created_at')->get()->groupBy(function($data2){
            return Carbon::parse($data2->created_at)->format('M');
        });

        $months1=[];
        $monthCount1=[];

        $months2=[];
        $monthCount2=[];

        foreach($data1 as $month =>$values){
            $months1[]=$month;
            $monthCount1[]=count($values);
        }
        foreach($data2 as $month =>$values){
            $months2[]=$month;
            $monthCount2[]=count($values);
        }

        return view('index',['data1'=>$data1,'months1'=>$months1, 'monthCount1'=>$monthCount1], 
        [ 'data2'=>$data2, 'months2'=>$months2, 'monthCount2'=>$monthCount2]);
    }

    //login
    public function login(){
        if(Auth::check()){
            return view('welcome');
        }
        else{
            return view('login');
        }
    }

    //Submit login
    public function submit_login(Request $request){
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
        $checkAdmin=Admin::where(['username'=>$request->username, 'password'=>$request->password])->count();
        if($checkAdmin>0){
            session(['adminLogin', true]);
            // $request->session()->put('username', $session[0]->username);
            return redirect('admin');
        }else{
            return redirect('admin/login')->with('msg', 'Invalid Credentials!');
        }
    }

    //logout
    public function logout(){
        session()->forget('adminLogout');
        return redirect('admin/login');
    }

    //auth

}
