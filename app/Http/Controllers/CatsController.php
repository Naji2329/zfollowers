<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cat;
use Str;
class CatsController extends Controller
{
    public function home()
    {
        return view('admins.cats',['title'=>'Categories Table']);
    }
    public function index()
    {
        return Cat::with('cat')->latest()->paginate(10);
    }
    public function filter_cats(Request $request)
    {
        $filter=$request->filter;
        if($filter=='main'){
            $cats=Cat::with('cat')->where('cat_id',null)->latest()->paginate(10);
        }elseif($filter=='sub'){
            $cats=Cat::with('cat')->where('cat_id','!=',null)->latest()->paginate(10);

        }

         return $cats;
    }



    
    public function store(Request $request)
    {
        $data=$this->validate($request,[
            'name'=>'required|string|max:191',
            'cat_id'=>'nullable|integer',
            'status'=>'nullable|string',
            'text'=>'nullable|string|max:1000',
            'content'=>'nullable|string',
            'example_link'=>'nullable|string|max:191',
        ]);
        $data['slug']=Str::slug($request->name);
        $cat= Cat::create($data);

        return $cat;
    }

    public function get_other_cats($parent_id=null){
        if($parent_id !=null){
            $cats=Cat::where('cat_id',$parent_id)->get();
        }else{
            $cats='';
        }
        return $cats;
    }
  
    public function update(Request $request, $id)
    {
        $data=$this->validate($request,[
            'name'=>'required|string|max:191',
            'cat_id'=>'nullable|integer',
            'status'=>'nullable|string',
            'text'=>'nullable|string|max:1000',
            'content'=>'nullable|string',
            'example_link'=>'nullable|string|max:191',
        ]);

        $data['slug']=Str::slug($request->name);
        Cat::where('id',$id)->update($data);
         return 'ok';
    }

   
    public function destroy($id)
    {
         Cat::find($id)->delete();
        return 'ok';
    }

    public function search($query){
        return Cat::with('cat')->where('name','like','%'.$query.'%')
            ->orwhere("id",'like','%'.$query.'%')
            ->orwhere("text",'like','%'.$query.'%')
            ->paginate(10);
    }
}
