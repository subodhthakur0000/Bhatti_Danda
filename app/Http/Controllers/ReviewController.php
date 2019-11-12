<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use DB;

class ReviewController extends Controller
{
    public function viewreview(){
		$re=DB::table('reviews')->paginate(6);
		
        return view('cd-admin.review.review',compact('re'));
	}
	public function addreview(){
	return view('cd-admin.review.addreview');
	}


	public function store(Review $p)
	{
  		$test = $p->validationinserta();
  		$p->store($test);
  		return redirect('/review');
	}
	 public function update($id,Review $p)
	 {
		$data = $p->validationinserta();
	    $p->edit($data,$id);
  		return redirect('/review');

	}
	public function delete($id,Review $p)
	{
  	$p->remove($id);
  	return redirect('/review');
	}
	public function status($id)
		{
		$a = [];
		$test = DB::table('reviews')->where('id',$id)->get()->first();
		if($test->status=='active')
		{
			$a['status'] = 'inactive';
		}
		else
		{
			$a['status'] = 'active'; 
		}
		DB::table('reviews')->where('id',$id)->update($a);
		return redirect('/review');
	}



}
