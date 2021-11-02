<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Settings;
use App\Admin;


class SettingsController extends Controller
{

    public function home(){   
    
            return view('admins.settings',['title'=>'Settings']);

    }
    public function profile(){   
    
            return view('admins.profile',['title'=>'Profile ']);

    }


    public function update(Request $request)
    {
        $id=Settings::first()->id;
        
        $data=$this->validate($request,[
            'site_name'=>'required|string|max:191',
            'email'=>'required|email',
            'welcome_message'=>'required|string|max:191',
            'instagram_url'=>'required|url|max:191',
            'paypal_base_uri'=>'required|url|max:191',
            'paypal_client_id'=>'required|string|max:191',
            'paypal_client_secret'=>'required|string|max:191',

        ]);
        
            if($request->logo ){
                $name = time().'.' . explode('/', explode(':', substr($request->logo, 0, strpos($request->logo, ';')))[1])[1];
            
            \Image::make($request->logo)->save('uploads/'.$name);
           
            $data['logo']=$name;
            }
            
            Settings::where('id',$id)->update($data);

           
         return 'ok';
     
    }

    public function update_profile(Request $request)
    {
        $id=Settings::first()->id;
        $this->validate($request,[
        'password'=>'sometimes|nullable|string|min:8|confirmed|max:191',
        ]);
        $data=$this->validate($request,[
            'name'=>'required|string|max:191',
            'email'=>'required|email|max:191',


        ]);
        
            if($request->password){
                $data['password']=bcrypt($request->password);
            }
            Admin::first()->update($data);

       
         return 'ok';
     
    }

    
  
}
