<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        // dd(Room::all());
        return view('admins.dashboard');
    }

    public function login(){
         if(auth()->guard('admin')->check()){
             return redirect('/admin');
         }else{
             return view('admins.login');
        }
    }


    public function dologin(){
    	$remember=request('remember')==1?true:false;
    	if(auth()->guard('admin')->attempt(['email'=>request('email'),'password'=>request('password')],$remember)){

    		return redirect('admin');
    	}else{
    		session()->flash('error','Information Error, please check your login Information!');
    		return redirect('admin/login');
    	}
    }

    public function logout(){
    	auth()->guard('admin')->logout();
    	return redirect('admin/login');
    }

    public function session(){
        if(session('lang')){
            return session('lang');
        }
    }

    public function auth(){
        return admin();
    }

    // public function get_nots(){
    //     $nots= admin()->notifications;
    //     foreach ($nots as $key => $not) {
    //         $not['ago']=$not->created_at->diffForHumans();
    //     }
    //     return $nots;
    // }



}
