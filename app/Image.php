<?php

namespace App;
use App\Traits\imageTrait;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{ 
	use imageTrait;
    protected $guarded=[];
    public function istore($data)
	{
		$a=[];
		$test = $this->insertimage($data['image']);
		$a['image'] = $test;
    
        $a['created_at'] =Carbon::now('Asia/Kathmandu');
        $replace = array_replace($data,$a);
         DB::table('images')->Insert($replace);
        Session::flash('success');
        
	}
  public function iremove($id){
    $g = DB::table('images')->where('id',$id)->get()->first();
        if(file_exists('imageupload/'.$g->image)) 
      {
        unlink('imageupload/'.$g->image);
       }
        DB::table('images')->where('id',$id)->delete();
    Session::flash('deletesuccess');
  }


	 public function validationinsert()
	{
  		$request =Request()->all();
  		$data =  Request()->validate([
    	'image' => 'required|image',
    	'altimage' => 'required',
    	'status'=>'required',
      'gallery_id'=>'required'
    	]);
  		return $data;
  	}
}
