<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Input;
use App\seo;
use DB;
use Carbon\Carbon;

class SEOController extends Controller
{
    public function add(){
    	return view('cd-admin.seo.addseo');
    }
    public function view(){
    	$seo=DB::table('seos')->get();
    	return view('cd-admin.seo.viewseo',compact('seo'));
    }
    public function store(SEO $s){
    	$test = $s->validationinsert();
  		$s->store($test);
        return redirect('/viewseo');

    }
    public function edit($id)
    {
    $ser = seo::where('id',$id)->get()->first();
     return view('cd-admin.seo.editseo',compact('ser'));
    
    }

    public function updateseo(seo $p,$id)
     {
        $data = $p->validationinsert();
    
        $p->updateseo($data,$id);
        return redirect('/viewseo');

    }
    public function delete($id,seo $p)
    {
    $p->remove($id);
    return redirect('/viewseo');
    }

   
     
    
}
