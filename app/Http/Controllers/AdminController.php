<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class AdminController extends Controller
{
    //Dashboard
    public function index(){
        return view('index');
    }

    //login
    public function login(){
        return view('login');
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
}
