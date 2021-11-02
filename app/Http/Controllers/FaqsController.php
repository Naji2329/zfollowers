<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Faq;
use Str;
class FaqsController extends Controller
{
    public function home()
    {
        return view('admins.faqs',['title'=>'Faqs Table']);
    }
    public function index()
    {
        return Faq::latest()->paginate(10);
    }

    public function store(Request $request)
    {
        $data=$this->validate($request,[
            'question'=>'required|string|max:191',
            'answer'=>'required|string|max:1000',
            'status'=>'nullable|string',
        ]);
        
        $cat= Faq::create($data);

        return $cat;
    }

    public function get_other_cats($parent_id=null){
        if($parent_id !=null){
            $cats=Faq::where('cat_id',$parent_id)->get();
        }else{
            $cats='';
        }
        return $cats;
    }
  
    public function update(Request $request, $id)
    {
        $data=$this->validate($request,[
            'question'=>'required|string|max:191',
            'answer'=>'required|string|max:1000',
            'status'=>'nullable|string',
        ]);

        
        Faq::where('id',$id)->update($data);
         return 'ok';
    }

   
    public function destroy($id)
    {
         Faq::find($id)->delete();
        return 'ok';
    }

    public function search($query){
        return Faq::where('question','like','%'.$query.'%')
            ->orwhere("answer",'like','%'.$query.'%')
            ->orwhere("id",'like','%'.$query.'%')
            ->paginate(10);
    }
}
