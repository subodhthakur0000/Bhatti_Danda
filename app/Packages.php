<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\imageTrait;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Carbon\Carbon;
class Packages extends Model
{
	use imageTrait;
	protected $guarded=[];

	public function store($data)
	{
		$a=[];
		$test = $this->insertimage($data['image']);
		$a['image'] = $test;
        $a['slug'] = str_slug($data['name']);
        $a['created_at'] =Carbon::now('Asia/Kathmandu');
        $replace = array_replace($data,$a);
        DB::table('packages')->Insert($replace);
        Session::flash('success');
	}

    public function edit($data,$id)
    {
        if(Input::hasFile('image'))
        {
         $test = DB::table('package')->where('id',$id)->get()->first();
         if (file_exists('imageupload/'.$test->image)) 
         {
             unlink('imageupload/'.$test->image);
         }
         
         $test = $this->addimage($data['image']);
         $a['image'] = $test ;
         $a['updated_at'] =Carbon::now('Asia/Kathmandu');
         $replace = array_replace($data,$a);
         $data = DB::table('packages')->where('id',$id)->update($replace);
    	 }
    	 else
    	 {
         $a['updated_at'] =Carbon::now('Asia/Kathmandu');
         $replace = array_replace($data,$a);
        DB::table('packages')->where('id',$id)->update($replace);
   		 }
   		 Session::flash('updatesuccess');
	}

	public function remove($id)
	{
		$test = DB::table('packages')->where('id',$id)->get()->first();
    	if (file_exists('imageupload/'.$test->image)) 
    	{
        unlink('imageupload/'.$test->image);
   		 }
    	DB::table('packages')->where('id',$id)->delete();
    	Session::flash('deletesuccess');
	}
    

    public function validationinsert()
	{
  		$request =Request()->all();
  		$data =  Request()->validate([
    	'name' => 'required',
    	'package' => 'required',
    	'image' => 'required|image|max:2048',
    	'imagealt' => 'required',
    	'status' => 'required',
		]);
  		return $data;
	}
	public function updatevalidation()
	{
		 $data =  Request()->validate([
    	'name' => 'required',
    	'package' => 'required',
    	'imagealt' => 'required',
    	'status' => 'required',
    	'image' => '',
		]);
  		return $data;
	}

    
}




