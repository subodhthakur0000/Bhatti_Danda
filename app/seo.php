<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Session;
use DB;
use Carbon\Carbon;

class seo extends Model
{
    protected $guarded=[];
    public function store($data)
	{
	$a=[];
	$a['created_at'] =Carbon::now('Asia/Kathmandu');
	$replace = array_replace($data,$a);
     DB::table('seos')->Insert($replace);
        Session::flash('success');
    }
    public function updateseo($data,$id)
    {

    	$a['updated_at'] =Carbon::now('Asia/Kathmandu');
         $replace = array_replace($data,$a);
        DB::table('seos')->where('id',$id)->update($replace);
   		Session::flash('updatesuccess');
	}

	public function remove($id)
	{
		$test = DB::table('seos')->where('id',$id)->get()->first();
    	
    	DB::table('seos')->where('id',$id)->delete();
    	Session::flash('deletesuccess');
	}


     public function validationinsert()
	   {
  		$request =Request()->all();
  		$data =  Request()->validate([
    	'name' => 'required',
    	'title' => 'required',
    	'keywords' => 'required|max:60',
    	'description' => 'required|max:60',
		    ]);
  		return $data;
	   }

	
}
