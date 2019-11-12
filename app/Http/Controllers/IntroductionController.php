<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Introduction;
use Session;
use DB;
class IntroductionController extends Controller
{
   public function add()
   {
   	return view('cd-admin.introduction.addintroduction');
   }

   public function show()
   {
   	$intro=DB::table('introductions')->get()->first();
   	return view('cd-admin.introduction.showintro',compact('intro'));
   }
   public function store()
   {
        $request = Request()->all();
        $v = $this->validateRequest();
        $intro = new Introduction;
        $intro['description'] = $request['description'];
         $intro->save();
         // session::flash('success');
         return redirect('/introshow');
    
    }

    	public function edit(){
    	$request = Request()->all();
        $v = $this->validateRequest();
        $intro = Introduction::get()->first();
        $intro['description'] = $request['description'];
        $intro->save();
         Session::flash('updatesuccess');
        return redirect('/introshow');
        }

    	

     public function validateRequest(){
        return Request()->validate([
            
            'description' => 'required',
            
        ]);
    }
   
}
