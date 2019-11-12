<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Carbon\Carbon;
use App\User;
use Auth;
use Session;

class AdminController extends Controller
{
    public function adminshow(){
    			$admin=DB::table('users')->get();
    	return view('cd-admin.admin.admin',compact('admin'));
			}

    	public function add(){
    		return view('cd-admin.admin.addadmin');
    	}

    	public function storeadmin(){
    	$a=[];
    	$data = $this->validationform();

		$a['created_at'] =Carbon::now('Asia/Kathmandu');
		$a['password']=bcrypt($data['password']);
		$replace = array_replace($data,$a);
     	DB::table('users')->Insert($replace);
     	Session::flash('success');
		return redirect('/view-all-admin');

    	}

    	public function delete($id)
    	{
    	$test = DB::table('users')->where('id',$id)->get()->first();
        
        DB::table('users')->where('id',$id)->delete();
        Session::flash('deletesuccess');
		return redirect('/view-all-admin');
    	}
    	public function validationform()
	{
    	$request=Request()->all();

    	$data =  Request()->validate([
        'name'=>'required',
        'email'=>'required|email',
        'password'=>'required|confirmed|min:6',
        'role'=>'required',
       	]);
       return $data;

   }



}
