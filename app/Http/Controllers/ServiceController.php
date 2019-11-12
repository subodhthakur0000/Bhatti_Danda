<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Input;
use App\Service;
use App\Traits\imageTrait;
use DB;
use Carbon\Carbon;

class ServiceController extends Controller
{
    use imageTrait;
    public function viewservice(){
        $ser=DB::table('services')->get();
        return view('cd-admin.services.services',compact('ser'));
    }

    
    public function addservice(){
      return view('cd-admin.services.addservice');
  }

  public function store(){

    $a = [];
    $data = $this->validationform();
    $img = $this->insertimage($data['image']);
    $a['image'] = $img;
    $a['created_at']=Carbon::now('Asia/Kathmandu');
    $final = array_merge($data,$a);
    DB::table('services')->Insert($final);
    Session::flash('success');
    return redirect('/allservices');

}

public function edit($id){
    if($ser = Service::where('id',$id)->get()->first()){
        return view('cd-admin.services.editservices',compact('ser'));
    }
}

public function update($id)
{  
   $services = DB::table('services')->where('id',$id)->get()->first();
    $a = [];
    $a['updated_at']=Carbon::now('Asia/Kathmandu');
    $data = $this->validationform();
    if(Input::hasFile('image'))
    {
        if (file_exists('imageupload/'.$services->image)) 
        {
            unlink('imageupload/'.$services->image);
        }
        $img = $this->insertimage($data['image']);
        $a['image'] = $img;        
        $final = array_merge($data,$a);
        $services = DB::table('services')->where('id',$id)->Update($final);
    }
else
    {
         $final = array_merge($data,$a);
        $services=DB::table('services')->where('id',$id)->Update($final);
    }
    Session::flash('updatesuccess');
    return redirect()->to('/allservices');

}

public function delete($id){

   $services = DB::table('services')->where('id',$id)->get()->first();
 
   if (file_exists('imageupload/'.$services->image)) 
        {
            unlink('imageupload/'.$services->image);
    }
    DB::table('services')->where('id',$id)->delete();
    Session::flash('deletesuccess');
   return redirect()->to('/allservices');
}

  public function sup($id)
  {
    $a = [];
    $test = DB::table('services')->where('id',$id)->get()->first();
    if($test->status=='active')
    {
      $a['status'] = 'inactive';
    }
    else
    {
      $a['status'] = 'active'; 
    }
    DB::table('services')->where('id',$id)->update($a);
    return redirect('/allservices');
  }


public function validationform()
{
    $request=Request()->all();
    if(Input::hasfile('image'))
    {

       $imagerequest = Request()->validate([
        'name'=>'required',
        'service'=>'required',
        'imagealt'=>'required',
        'status'=>'required',
        'image'=>'required|image|max:2048',


    ]);
       return $imagerequest;

   }
   else
   {
       $formrequest = Request()->validate([
        'name'=>'required',
        'service'=>'required',
        'imagealt'=>'required',
        'status'=>'required',

    ]);
       return $formrequest;

   }
}



}
