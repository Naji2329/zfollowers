<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Str;

class UsersController extends Controller
{

    public function home(){   
    
            return view('admins.users',['title'=>'Users Table']);

    }

   
    public function index()
    {
        return User::latest()->paginate(10);
    }

   
   
    public function store(Request $request)
    {
        $data=$this->validate($request,[
            'name'=>'nullable|string|max:191',
            'email'=>'required|email|unique:users',
            'password'=>'required|string|min:8',
        ]);
        

            if($request->image ){
                $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            
            \Image::make($request->image)->save('uploads/'.$name);
           
            $data['image']=$name;
            }
            if($request->password){
                $data['password']=bcrypt($request->password);
            }

        $user= User::create($data);
        
        


        return $user;
    }

    public function show($id)
    {
      
    }

    
    public function update(Request $request, $id)
    {
        $user=User::find($id);
        
        $data=$this->validate($request,[
            'name'=>'nullable|string|max:191',
            'email'=>'required|email|unique:users,email,'.$id,
            'status'=>'nullable|string|max:191',
        ]);
        
            if($request->image ){
                $name = time().'.' . explode('/', explode(':', substr($request->image, 0, strpos($request->image, ';')))[1])[1];
            
            \Image::make($request->image)->save('uploads/'.$name);
           
            $data['image']=$name;
            }
            if($request->password){
                $data['password']=bcrypt($request->password);
            }
         User::where('id',$id)->update($data);

       
         return 'ok';
     
    }

    
    public function destroy($id)
    {
       return User::find($id)->delete();
    }

    public function search($query){
        return User::with('roles')->where('name','like','%'.$query.'%')
            ->orwhere("email",'like','%'.$query.'%')
            ->orwhere("id",'like','%'.$query.'%')
            ->paginate(10);
    }
}
