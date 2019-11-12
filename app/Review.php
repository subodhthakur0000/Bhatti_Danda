<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Carbon\Carbon;

class Review extends Model
{
	protected $guarded=[];
	public function store($data)
	{
	$a=[];
	$a['created_at'] =Carbon::now('Asia/Kathmandu');
	$replace = array_replace($data,$a);
     DB::table('reviews')->Insert($replace);
        Session::flash('success');
    }

     public function edit($data,$id)
    {
         $a['updated_at'] =Carbon::now('Asia/Kathmandu');
         $replace = array_replace($data,$a);
        DB::table('reviews')->where('id',$id)->update($replace);
   		 
   		 Session::flash('updatesuccess');
	}

   	public function remove($id)
	{
		
    	DB::table('reviews')->where('id',$id)->delete();
    	Session::flash('deletesuccess');
	}

    

     public function validationinserta()
	{
  		$request =Request()->all();
  		$data =  Request()->validate([
    	'name' => 'required',
    	'address' => 'required',
    	'summary' => 'required',
    	'status' => 'required',
		]);
  		return $data;
	}
}
