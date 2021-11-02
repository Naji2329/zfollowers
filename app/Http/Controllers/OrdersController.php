<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Service;
use App\User;
use Str;
class OrdersController extends Controller
{
    public function home()
    {
        return view('admins.orders',['title'=>'orders Table']);
    }
    public function index()
    {
        $orders= Order::latest()->paginate(10);

        foreach ($orders as $key => $order) {
            $order['service']=Service::where('id',$order->service_id)->first();
            $order['user']=User::where('id',$order->user_id)->first();
        }

        return $orders;
    }

    public function filter_orders(Request $request)
    {
        $filter=$request->filter;
        $orders= Order::where('status',$filter)->latest()->paginate(10);

        foreach ($orders as $key => $order) {
            $order['service']=Service::where('id',$order->service_id)->first();
            $order['user']=User::where('id',$order->user_id)->first();
        }

         return $orders;
    }


    public function update(Request $request, $id)
    {
        $data=$this->validate($request,[
            'status'=>'nullable|string',
        ]);

        
        Order::where('id',$id)->update($data);
         return 'ok';
    }

   
    public function destroy($id)
    {
         Order::find($id)->delete();
        return 'ok';
    }

    public function search($query){
        $orders= Order::where('id','like','%'.$query.'%')
            ->orwhere("email",'like','%'.$query.'%')
            ->orwhere("instagram_username",'like','%'.$query.'%')
            ->orwhere("url",'like','%'.$query.'%')
            ->paginate(10);
            foreach ($orders as $key => $order) {
            $order['service']=Service::where('id',$order->service_id)->first();
            $order['user']=User::where('id',$order->user_id)->first();
        }

        return $orders;
    }
}
