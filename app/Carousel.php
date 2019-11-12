<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use App\Traits\imageTrait;
use Illuminate\Support\Facades\Input;
use Session;
use DB;
use Carbon\Carbon;

class Carousel extends Model
{
	use imageTrait;
    protected $guarded=[];
    
    public function store($set)
	{
		$a=[];
		$test = $this->insertimage($set['image']);
		$a['image'] = $test;
        $a['created_at'] =Carbon::now('Asia/Kathmandu');
        $replace = array_replace($set,$a);
        DB::table('carousels')->Insert($replace);
        Session::flash('success');
	}
  public function remove($id)
  {
    $test = DB::table('carousels')->where('id',$id)->get()->first();
      if (file_exists('imageupload/'.$test->image)) 
      {
        unlink('imageupload/'.$test->image);
       }
      DB::table('carousels')->where('id',$id)->delete();
      Session::flash('deletesuccess');
  }


	public function insertcontrol()
	{
  		$request =Request()->all();
  		$data =  Request()->validate([
    	'name' => 'required',
    	'description' => 'required',
    	'image' => 'required|image',
    	'alt' => 'required',
    	'status' => 'required',
		]);
  		return $data;
	}
 
}
