<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Member;
use Carbon\carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //Dashboard
    public function index(Request $r){

        if(!$r->session()->get("adminLogin")){
            return redirect()->to(route('admin_login'));
        }
        
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
    public function login(Request $request){

        if($request->session()->get("adminLogin")){
            
            return redirect()->to(route('dashboard'));
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
            Session::put('adminLogin', 'username');
            // $request->session()->put('username', $session[0]->username);
            return redirect('admin');
        }else{
            return redirect('admin/login')->with('msg', 'Invalid Credentials!');
        }
    }

    //logout
    public function logout(){
        Session::flush();
        return redirect('admin/login');
    }

    //auth

}
