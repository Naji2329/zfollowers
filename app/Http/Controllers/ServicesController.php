<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use Str;
class ServicesController extends Controller
{
    public function home()
    {
        return view('admins.services',['title'=>'Services Table']);
    }
    public function index()
    {
        return Service::with('cat')->with('parent')->latest()->paginate(10);
    }


    public function store(Request $request)
    {
        $data=$this->validate($request,[
            'title'=>'required|string|max:191',
            'parent_id'=>'nullable|numeric',
            'quantity'=>'required|numeric',
            'cat_id'=>'required|numeric',
            'price'=>'required',
            'discount'=>'nullable|numeric',
            'desc'=>'required|string',
            'status'=>'nullable|string',
        ]);
        $data['slug']=Str::slug($request->title);
        $service= Service::create($data);

        return $service;
    }

  
    public function update(Request $request, $id)
    {
        $data=$this->validate($request,[
            'title'=>'required|string|max:191',
            'quantity'=>'required|numeric',
            'parent_id'=>'nullable|numeric',
            'cat_id'=>'required|numeric',
            'price'=>'required',
            'discount'=>'nullable|numeric',
            'desc'=>'required|string',
            'status'=>'nullable|string',
        ]);

        $data['slug']=Str::slug($request->title);
        Service::where('id',$id)->update($data);
         return 'ok';
    }

   
    public function destroy($id)
    {
         Service::find($id)->delete();
        return 'ok';
    }

    public function search($query){
        return Service::with('cat')->with('parent')->where('title','like','%'.$query.'%')
            ->orwhere("id",'like','%'.$query.'%')
            ->orwhere("desc",'like','%'.$query.'%')
            ->orwhere("price",'like','%'.$query.'%')
            ->paginate(10);
    }
}
