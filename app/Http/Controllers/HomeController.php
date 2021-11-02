<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index($status=null)
    {   
        if($status==null || $status=='progress' || $status=='completed' || $status=='canceled'){
            if(session()->has('checkout')){
                return redirect('/checkout/order');
            }
            return view('home',['status'=>$status]);
        }else{
            return 'not found';
        }
    } 
}
