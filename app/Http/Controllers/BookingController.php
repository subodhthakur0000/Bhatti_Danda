<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Bookingmail; 
use App\Packages;
use App\BookingReply;
use App\BookingStatus;
use App\Mail\acceptbooking;
use App\Mail\rejectbooking;
use App\Bookings;
use Session;
use Carbon\Carbon;
use DB;


class BookingController extends Controller
{
    //

    public function booking(){
         $c=DB::table('bookings')->orderBy('id','desc')->get();
         $status=DB::table('booking_statuses')->get();
         $name=DB::table('users')->get();
		return view('cd-admin.booking.bookings',compact('c','status','name'));
	}


	public function create($slug)
    {
        $pak = Packages::where('slug',$slug)->get()->first();
        return view('cd-admin.booking.createbooking',compact('pak'));
    }

    public function book(){
        $request = Request()->all();
            $b = new Bookings();
            Request()->validate([
            'name'=>'required',
            'email'=>'required|email',
            'age'=>'required',
            'location' =>'required',
            'contact' =>'required|max:13',
            'gender' =>'required|max:6',
            'message'=>'required'

        ]);

        $b['name'] = $request['name'];
        $b['email'] = $request['email'];
        $b['age'] = $request['age'];
        $b['gender']=$request['gender'];
        $b['location'] = $request['location'];
        $b['contact'] = $request['contact'];
        $b['message'] = $request['message'];
        $b['slug'] = $request['slug'];
        $b->save();
       return redirect('/');

    }


    public function deleteinbox($id){
         DB::beginTransaction();
        try{
        DB::table('bookings')->where('id',$id)->delete();
        BookingStatus::where('contact_id',$id)->delete();
        DB::commit();
        Session::flash('deletesuccess');
        return redirect('/bookings');
        }
         catch(\Exception $e){
            DB::rollback();

        }

        
    }

    public function replyform($id){
        $n=DB::table('bookings')->where('id',$id)->get()->first();
        return view('cd-admin.booking.bookingreply',compact('n'));
    }


    public function reply(){
       $s = DB::table('booking_replies')->get();
        return view('cd-admin.booking.viewbookingreply',compact('s'));
    }
    public function storereply($id){
         $data = request()->validate([
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
            'active'=>'required',
            
        ]);
        $a = [];
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['contact_id'] = $id;
        $final = array_merge($a,$data);
        DB::table('booking_replies')->insert($final);
        
         Mail::to($data['email'])->send(new Bookingmail($data));
        return redirect('/reply');
       
    }

    public function astore($id){
        $data = request()->validate([
            'email' => 'required',
            'active'=>'required',
            'status' => 'required'
        ]);
        $a = [];
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['contact_id'] = $id;
        $final = array_merge($a,$data);
        DB::table('booking_statuses')->insert($final);
    
        
         Mail::to($data['email'])->send(new acceptbooking($data));
       return redirect('/bookings');

    }

     public function rstore($id){
        $data = request()->validate([
            'email' => 'required',
            'active'=>'required',
            'status' => 'required'
        ]);
        $a = [];
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $a['contact_id'] = $id;
        $final = array_merge($a,$data);
         DB::table('booking_statuses')->insert($final);
    
        
         Mail::to($data['email'])->send(new rejectbooking($data));
       return redirect('/bookings');

    }

    

    
     public function deletereply($id){
        DB::table('booking_replies')->where('id',$id)->delete();
        Session::flash('deletesuccess');
        return redirect('/reply');
    }
}
