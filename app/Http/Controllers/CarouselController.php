<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carousel;
use App\Traits\imageTrait;
use Illuminate\Support\Facades\Input;
use DB;
use Session;

class CarouselController extends Controller
{
    use imageTrait;
    public function carousel(){
        $car = Carousel::all();
        return view('cd-admin.carousel.carousel',compact('car'));
    }
      
    public function addcarousel(){
         return view('cd-admin.carousel.addcarousel');
    }


   public function store(Carousel $c)
    {

        $set = $c->insertcontrol();
        $c->store($set);
        return redirect('/carousel');
    }
    public function delete($id,Packages $p)
    {
    $p->remove($id);
    return redirect('/carousel');
    }

public function statusupdate($id)
    {
        $a = [];
        $test = DB::table('carousels')->where('id',$id)->get()->first();
        if($test->status=='active')
        {
            $a['status'] = 'inactive';
        }
        else
        {
            $a['status'] = 'active'; 
        }
        DB::table('carousels')->where('id',$id)->update($a);
        return redirect('/carousel');
    }
    
    

}
