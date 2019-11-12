<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use DB;
use Session;
use App\Mail\quick;
use App\BookingReply;
use App\BookingStatus;
use App\Bookings;
use Carbon\Carbon;
use Auth;


class DashboardController extends Controller
{
    public function dashboard(){

        // dd(Auth::user()->email); 
    	$test =	DB::table('quick_mails')->orderBy('id', 'DESC')->take(5)->get();
    	$packages=DB::table('packages')->get();
        $acept=DB::table('booking_statuses')->where('status','approved')->get();
        $accepted=count($acept);
        $reject=DB::table('booking_statuses')->where('status','rejected')->get();
        $rejected=count($reject);
        $admin = DB::table('users')->orderBy('id','DESC')->get()->first();  

    	$pak=count($packages);


    	$book = DB::table('bookings')->get();
        $b=count($book);
        $booking=$b-$accepted-$rejected;
        

    	
    	return view('cd-admin.home.home',compact('test','booking','rejected','accepted','pak','admin'));
    }

    public function view(){
    	$t =	DB::table('quick_mails')->orderBy('id', 'DESC')->paginate(1);
    	return view('cd-admin.home.mails',compact('t'));
    }

    public function mail(){
    	$data = request()->validate([
    		'email' => 'required|email',
    		'subject'=>'required',
    		'message' => 'required'
    	]);

        $a = [];
        $a['created_at'] = Carbon::now('Asia/Kathmandu');
        $final = array_merge($a,$data);
        DB::table('quick_mails')->insert($final);
        Mail::to($data['email'])->send(new quick($data));
        Session::flash('success');

      	return redirect('/');
    }

    public function del($id){
    	 DB::table('quick_mails')->where('id',$id)->delete();
        Session::flash('deletesuccess');
        return redirect('view-all-mails');
    }


}
