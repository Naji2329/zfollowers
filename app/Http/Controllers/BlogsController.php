<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Blog;
use Str;

class BlogsController extends Controller
{

    public function home(){   
    
            return view('admins.blogs',['title'=>'Blogs Table']);

    }

   
    public function index()
    {
        return Blog::latest()->paginate(10);
    }

   
   
    public function store(Request $request)
    {
        $data=$this->validate($request,[
            'title'=>'required|string|max:191',
            'image'=>'required',   
            'content'=>'required|string|max:9999',
        ]);
        

            if($request->image ){
                $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            
            \Image::make($request->image)->save('uploads/'.$name);
           
            $data['image']=$name;
            }
           
        $data['slug']=Str::slug($request->title);
        $blog= Blog::create($data);
        
        


        return $blog;
    }

    public function show($id)
    {
      
    }

    
    public function update(Request $request, $id)
    {
        $blog=Blog::find($id);
        
        $data=$this->validate($request,[
            'title'=>'required|string|max:191',
            'content'=>'required|string|max:9999',
        ]);
        
            if($request->image ){
                $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            
            \Image::make($request->image)->save('uploads/'.$name);
           
            $data['image']=$name;
            }
        $data['slug']=Str::slug($request->title);
         Blog::where('id',$id)->update($data);

       
         return 'ok';
     
    }

    
    public function destroy($id)
    {
       return Blog::find($id)->delete();
    }

    public function search($query){
        return Blog::where('title','like','%'.$query.'%')
            ->orwhere("id",'like','%'.$query.'%')
            ->paginate(10);
    }
}
