<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Input;
use App\Gallery;
use App\Image;
use App\Traits\imageTrait;
use DB;
use Carbon\Carbon;

class GalleryController extends Controller
{   use imageTrait;
	public function viewalbum(){
        $gal=DB::table('galleries')->get();
		return view('cd-admin.gallery.viewgallery',compact('gal'));
	}
	public function addimage($id){
        $g = Gallery::where('id',$id)->get()->first();

		return view('cd-admin.gallery.addimage',compact('g'));
	}
	
	public function create()
    {
		return view('cd-admin.gallery.addgallery');
	}

     public function image($album_id)
     {

        $ga=DB::table('galleries')->get();
        $im=DB::table('images')->where('gallery_id',$album_id)->get();
 	  return view('cd-admin.gallery.imageview',compact('im','album_id','ga'));

	 }


    public function gstore(Gallery $p)
    {
        $test = $p->validationinsert();
        $p->gstore($test);
      return redirect('/viewgallery');
    }

    public function gremove(Gallery $p,$id)
    {
         $p->remove($id);
        return redirect('/viewgallery');
    } 



     public function gsupdate($id)
    {   $a = [];
        $test = DB::table('galleries')->where('id',$id)->get()->first();
        
        if($test->status=='active')
        {
            $a['status'] = 'inactive';
        }
        else
        {
            $a['status'] = 'active'; 
        }
        $a['updated_at'] =Carbon::now('Asia/Kathmandu');
        DB::table('galleries')->where('id',$id)->update($a);
        return redirect('/viewgallery');
    }




                  // IMAGES


    public function istore(Image $i,$id){
        $img=$i->validationinsert();
        $i->istore($img);
        return redirect('/igallery/'.$id);
    }


        public function iremove(Image $i,$id){
            
        $getid = Image::where('id',$id)->get()->first();
        $i->iremove($id);
     
         return redirect('/igallery/'.$getid->gallery_id);
          //return redirect()->back();
    }   

      public function isupdate($id)
    {   $a = [];
        $test = DB::table('images')->where('id',$id)->get()->first();
        
        if($test->status=='active')
        {
            $a['status'] = 'inactive';
        }
        else
        {
            $a['status'] = 'active'; 
        }
        $a['updated_at'] =Carbon::now('Asia/Kathmandu');
        DB::table('images')->where('id',$id)->update($a);
        return redirect('/igallery/'.$id);
    }
   
}

