<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carousel;
use App\Packages;
use App\Knowabout;
use App\Review;
use App\Bookings;
use App\Gallery;
use App\Image;
use Introduction;
use DB;

class FrontendController extends Controller
{
	public function about(){
		$about = DB::table('knowabouts')->get();
		$seo = DB::table('seos')->where('name','About')->get()->first();
		
		return view('frontend.about.know-about-phool-maya',compact('about','seo'));
	}

	public function service(){
		$seo = DB::table('seos')->where('name','Service')->get()->first();
	$service = DB::table('services')->where('status','active')->get();
    return view('frontend.service.ourservice',compact('service','seo'));
	}

	public function package(){
		$seo = DB::table('seos')->where('name','Package')->get()->first();	
	$package = DB::table('packages')->where('status','active')->orderBy('id','DESC')->get();
    return view('frontend.package.package',compact('package','seo'));
	}

	public function review(){
		$seo = DB::table('seos')->where('name','Review')->get()->first();
	$review = DB::table('reviews')->where('status','active')->orderBy('id','DESC')->get();
    return view('frontend.guestreviews.guestreviews',compact('review','seo'));
	}

	public function contact(){
		
		$contact = DB::table('contacts')->get();
		$seo = DB::table('seos')->where('name','Contact')->get()->first();
		return view('frontend/contact.contact',compact('contact','seo'));
	}

	public function gallery(){
		$seo = DB::table('seos')->where('name','Gallery')->get()->first();
		$gallery = DB::table('galleries')->where('status','active')->orderBy('id', 'DESC')->get()->take(4);
		return view('frontend.gallery.gallery',compact('gallery','seo'));
	}

	public function booking(){
		$seo = DB::table('seos')->where('name','Booking')->get()->first();
		$pak = DB::table('packages')->get();
	
		$booking = DB::table('bookings')->get();
    		return view('frontend.booking.booking',compact('booking','pak','seo'));
	}

	public function home(){
		$seo = DB::table('seos')->where('name','Home')->get()->first();
		$car = DB::table('carousels')->where('status','active')->get()->take(3);
		$intro = DB::table('introductions')->get()->first();
		$gal = DB::table('galleries')->where('status','active')->orderBy('id', 'DESC')->get()->take(4);
    return view('frontend.home.home',compact('intro','gal','car','seo'));
	}

	public function album($id){

		$g = DB::table('galleries')->where('id',$id)->get(); 
		$images=DB::table('images')->where('gallery_id',$id)->where('status','active')->orderBy('id','desc')->get();
		return view('frontend.gallery.album1',compact('images','g'));
	}


}