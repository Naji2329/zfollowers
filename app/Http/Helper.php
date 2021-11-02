<?php

use App\Cat;
use App\Service;
use App\Settings;
use App\Faq;
use App\Blog;
use App\Order;
use App\User;

if(!function_exists('admin')){

    function admin(){
        return auth()->guard('admin')->user();
    }
}

if(!function_exists('user')){

    function user(){
        return auth()->user();
    }
}

if(!function_exists('cats')){

    function cats($pagination=null){
        if($pagination==null){
            $cats= Cat::latest()->get();
        }else{
            $cats=Cat::latest()->paginate($pagination);
        }
        return $cats;
    }
}
if(!function_exists('name_shortcut')){

    function name_shortcut($user_name){
        $words = explode(" ", $user_name);
        $acronym = "";

        foreach ($words as $w) {
        $acronym .= $w[0];
        }

        return $acronym;
    }
}


if(!function_exists('parents')){

    function parents(){
        
            $cats=Cat::where('cat_id',null)->latest()->get();
    
        return $cats;
    }
}
if(!function_exists('services')){

    function services(){
        
            $services=Service::latest()->get();
    
        return $services;
    }
}


if(!function_exists('desc_filter')){

    function desc_filter($service_desc){
        $words = explode("-", $service_desc);
        $acronym = "";

        foreach ($words as $w) {
        $acronym .= '<p class="service-desc"> <i class="fa fa-star-o"></i>'.$w.'</p>';
        }

        return $acronym;
    }
}

if(!function_exists('parents_with_cats')){

    function parents_with_cats(){
        
            $parents=Cat::where('cat_id',null)->where('status','active')->with('cats')->get();
    
        return $parents;
    }
}

if(!function_exists('parent_with_cats')){

    function parent_with_cats($id){
        
            $parent=Cat::where('id',$id)->where('status','active')->with('cats')->first();
    
        return $parent;
    }
}

if(!function_exists('cat_services')){

    function cat_services($cat_id){
        
            $services=Service::where('cat_id',$cat_id)->where('status','active')->orderby('price','asc')->get();
    
        return $services;
    }
}

if(!function_exists('related_services')){

    function related_services($parent_id,$cat_id){
        
            $services=Service::where('cat_id',$cat_id)->where('parent_id',$parent_id)->where('status','active')->orderby('price','asc')->get();
            foreach ($services as $key => $service) {
                $service['quantity']=number_format($service->quantity);
                if($service->discount==null){
                    $price=$service->price;
                }else{
                    $price=round($service->price-($service->price*$service->discount/100),2);
                }
                $service['price']=$price;
            }
    
        return $services;
    }
}

if(!function_exists('settings')){

    function settings(){
        
            $settings=Settings::first();
    
        return $settings;
    }
}

if(!function_exists('faq')){

    function faq(){
        
            $faqs=Faq::latest()->get();
    
        return $faqs;
    }
}

if(!function_exists('blog')){

    function blog($paginate=null){
            if($paginate==null){
                $blogs=Blog::latest()->get();
            }else{
                $blogs=Blog::latest()->paginate($paginate);

            }
            
        return $blogs;
    }
}
if(!function_exists('user_orders')){

    function user_orders($status=null){
        if($status==null){
            $orders=Order::where('user_id',user()->id)->where('status','progress')->get();
        }else{
            $orders=Order::where('user_id',user()->id)->where('status',$status)->get();
        }
            foreach ($orders as $key => $order) {
            $order['service']=Service::where('id',$order->service_id)->first();
            $order['user']=User::where('id',$order->user_id)->first();
        }
        return $orders;
    }
}

if(!function_exists('discount_price')){

    function discount_price($price,$discount=null){
            if($discount==null){
                $value=$price;
            }else{
                $value=$price - round(($price * $discount / 100),2);
            }
            
        return $value;
    }
}


////////
// Admin fetch data
///////

if(!function_exists('data')){

    function data(){
          $data=[];
          $data['progress_orders']=Order::where('status','progress')->count();      
          $data['completed_orders']=Order::where('status','completed')->count();      
          $data['canceled_orders']=Order::where('status','canceled')->count();      
          $data['users']=User::where('status','active')->count();      
          $data['cats']=Cat::where('cat_id',null)->count();      
          $data['services']=Service::count();      
            
        return $data;
    }
}



