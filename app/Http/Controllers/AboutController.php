<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Knowabout;
use App\Traits\imageTrait;
use Illuminate\Support\Facades\DB;
use Session;
class AboutController extends Controller
{   
    use imageTrait;
    
    public function about(){
        return view('cd-admin.about.aboutform');
    }


    public function aboutdetail(){
        $about = DB::table('knowabouts')->get()->first();
        return view('cd-admin.about.aboutdetail',compact('about'));
    }
         public function aboutstore(){
        $request = Request()->all();
        $v = $this->validateRequest();
        $about = new Knowabout;
        $about['name'] = $request['name'];
        $about['tagline'] = $request['tagline'];
        $img = $this->insertimage($request['image']);
        $about['image']= $img;
        $about['altimage'] = $request['altimage'];
        $about['description'] = $request['description'];
        $pdf = $this->insertfile($request['pdf']);
        $about['file'] = $pdf;
        $about['video'] = $request['video'];
         $about->save();
         return redirect('/aboutdetail');
    
    }
    public function aboutupdate()
    {
        $request = Request()->all();
        $v = $this->updaterequest();
        $about = Knowabout::where('id',$id)->get()->first();
        $about['name'] = $request['name'];
        $about['tagline'] = $request['tagline'];
        $about['altimage'] = $request['altimage'];
        $about['description'] = $request['description'];
        $about['video'] = $request['video'];
        // if(request()->hasFile('image'))
        // {
        //     $img = $this->insertimage($request['image']);
        //     $about['image']= $img;
        // }
        // if(request()->hasFile('pdf')){
        // $pdf = $this->insertfile($request['pdf']);
        // $about['file'] = $pdf;
        $about->save();
          Session::flash('updatesuccess');
        return redirect('/aboutdetail');
        }

    




      public function validateRequest(){
        return Request()->validate([
            'name' => 'required',
            'tagline' => 'required',
            'altimage' => 'required',
            'description' => 'required',
            'video' => 'required|url',
            'image' => 'required|mimes:jpeg,png,jpg,JPEG,JPG,PNG',
            'pdf' => 'required|mimes:pdf',
        ]);
    }

     public function updaterequest(){
        return Request()->validate([
            'name' => 'required|max:255',
            'tagline' => 'required|max:255',
            'altimage' => 'required|max:255',
            'description' => 'required',
            'video' => 'required|url',
        ]);
    }
}