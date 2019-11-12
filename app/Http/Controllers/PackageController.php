<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Packages;
use App\Traits\imageTrait;
use DB;
class PackageController extends Controller
{
    public function viewpackage(){
    	$pak=DB::table('packages')->get();
        return view('cd-admin.package.packages',compact('pak'));
	}

	public function addpackage(){
		return view('cd-admin.package.addpackages');
	}

	public function store(Packages $p)
	{
  		$test = $p->validationinsert();
  		$p->store($test);
  		return redirect('/allpackages');
	}
	
	public function update($id,Packages $p){
		$data = $p->updatevalidation();
	    $p->edit($data,$id);
  		return redirect('/allpackages');

	}
	public function delete($id,Packages $p)
	{
  	$p->remove($id);
  	return redirect('/allpackages');
	}

	public function sup($id)
	{
		$a = [];
		$test = DB::table('packages')->where('id',$id)->get()->first();
		if($test->status=='active')
		{
			$a['status'] = 'inactive';
		}
		else
		{
			$a['status'] = 'active'; 
		}
		DB::table('packages')->where('id',$id)->update($a);
		return redirect('/allpackages');
	}

}
