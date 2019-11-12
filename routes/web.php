<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
// 	// $book = App\BookingReply::all();
// 	// foreach($book as $b)
// 	// {
// 	// 	$check = App\Bookings::where('id','!=',$b['contact_id'])->get();
// 	// 	dd(count($check));
// 	// }

// 	$book = DB::table('booking_replies')
// 			->join('bookings','booking_replies.contact_id','!=', 'bookings.id' )
// 			->get();
// 	$count = count($book);
//     return view('cd-admin.home.home',compact('count'));
// });




Route::get('/','FrontendController@home');
Route::get('know-about-phool-maya','FrontendController@about');


Route::get('ourservice','FrontendController@service'); 

Route::get('package','FrontendController@package');

Route::get('contact','FrontendController@contact');

Route::get('gallery','FrontendController@gallery');

Route::get('booking/{slug}','FrontendController@booking');

Route::get('album/{id}','FrontendController@album')->name('album1');





Route::get('room', function () {
    return view('frontend.room.room');
});







Route::get('album2', function () {
    return view('gallery.album2');
});


Route::get('album3', function () {
    return view('frontend.gallery.album3');
});


Route::get('album4', function () {
    return view('frontend.gallery.album4');
});

Route::get('whyus', function () {
    return view('frontend.whyus.whyus');
});

Route::get('guestreviews','FrontendController@review');

























Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {

	View::composer('cd-admin.header.header', function ($view) {
		$serv = DB::table('services')->count();
		$rev = DB::table('reviews')->count();
    	$pack = DB::table('packages')->count();
    	$acept=DB::table('booking_statuses')->where('status','approved')->get();
        $accepted=count($acept);
        $reject=DB::table('booking_statuses')->where('status','rejected')->get();
        $rejected=count($reject);
        $book = DB::table('bookings')->get();
        $b=count($book);
        $booking=$b-$accepted-$rejected;
    	


      $view->with(['serv'=>$serv,'pack'=>$pack,'booking'=>$booking,'rev'=>$rev] );
});
    //

Route::get('/logout','HomeController@logout')->name('logout');


Route::get('dashboard','DashboardController@dashboard');
Route::post('/quickmail','DashboardController@mail');
Route::get('view-all-mails','DashboardController@view');
Route::get('/deletemail/{id}','DashboardController@del');
	

	//ADMIN
Route::get('/view-all-admin','AdminController@adminshow');
Route::get('/addadmin','AdminController@add');
Route::post('/storeadmin','AdminController@storeadmin');
Route::get('/deleteadmin/{id}','AdminController@delete');

//ABout
Route::get('/about','AboutController@about');
Route::get('/aboutdetail','AboutController@aboutdetail');
Route::post('/aboutstore','AboutController@aboutstore');
Route::post('/aboutupdate','AboutController@aboutupdate');


//Introduction
Route::get('/addintroduction','IntroductionController@add');
Route::post('/introstore','IntroductionController@store');
Route::get('/introshow','IntroductionController@show');
Route::post('/introupdate','IntroductionController@edit');



//CAROUSEL
Route::get('/carousel','CarouselController@carousel');
Route::get('/addcarousel','CarouselController@addcarousel');
Route::post('/storecarousel','CarouselController@store');
Route::post('/statuscar/{id}','CarouselController@statusupdate');
Route::get('/deletecar/{id}','CarouselController@delete');






//SERVICES
Route::get('/allservices','ServiceController@viewservice');
Route::get('/addservice','ServiceController@addservice');
Route::post('/storeservices','ServiceController@store');
Route::get('/editservices/{id}','ServiceController@edit');
Route::post('/update/{id}','ServiceController@update');
Route::get('/delete/{id}','ServiceController@delete');
Route::post('/statusup/{id}','ServiceController@sup');



//packages
Route::get('/allpackages','PackageController@viewpackage');
Route::get('/addpackages','PackageController@addpackage');
Route::post('/storepackages','PackageController@store');
Route::post('/updatepackage/{id}','PackageController@update');
Route::post('/status/{id}','PackageController@sup');
Route::get('/deletepackages/{id}','PackageController@delete');





//Review
Route::get('/addreview','ReviewController@addreview');
Route::get('/review','ReviewController@viewreview');
Route::post('/storereview','ReviewController@store');
Route::post('/updatereview/{id}','ReviewController@update');
Route::get('/deletereview/{id}','ReviewController@delete');
Route::post('/statusupdate/{id}','ReviewController@status');



//Gallery

Route::get('/addgallery','GalleryController@create');
Route::get('/viewgallery','GalleryController@viewalbum');
Route::get('/igallery/{id}','GalleryController@image');
Route::get('/addimage/{id}','GalleryController@addimage');
Route::post('/gallerystore','GalleryController@gstore');
Route::get('/deletegallery/{id}','GalleryController@gremove');
Route::post('/imagestore/{id}','GalleryController@istore');
Route::get('/deleteimage/{id}','GalleryController@iremove');
Route::Post('/gsupdate/{id}','GalleryController@gsupdate');
Route::Post('/isupdate/{id}','GalleryController@isupdate');






//Contact

Route::get('/viewcontact','ContactController@contact');
Route::get('/replies','ContactController@reply');
Route::get('/replycontact/{id}','ContactController@replyform');
Route::get('/createcontact','ContactController@create');
ROute::post('/storecontact','ContactController@store');
Route::post('/storereply/{id}','ContactController@storereply');
Route::get('/deleteinbox/{id}','ContactController@deleteinbox');
Route::get('/deletereply/{id}','ContactController@deletereply');





//SEO
Route::get('/addseo','SEOController@add');
Route::get('/viewseo','SEOController@view');
Route::post('/seostore','SEOController@store');
Route::get('/editseo/{id}','SEOController@edit');
Route::post('/updateseo/{id}','SEOController@updateseo');
Route::get('/deleteseo/{id}','SEOController@delete');




//BOOKINGS
Route::get('/bookings','BookingController@booking');
Route::get('/bookingscreate/{slug}','BookingController@create');
Route::post('/bookingsstore','BookingController@book');
Route::get('/deletebook/{id}','BookingController@deleteinbox');
Route::get('/reply/{id}','BookingController@replyform');
Route::post('/bookingreply/{id}','BookingController@storereply');
Route::get('/reply','BookingController@reply');
Route::get('/deletebookingreply/{id}','BookingController@deletereply');
Route::post('/bookinga/{id}','BookingController@astore');
Route::post('/bookingb/{id}','BookingController@rstore');



});


