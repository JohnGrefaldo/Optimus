<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Http\Request;
use \DrewM\MailChimp\MailChimp;

Route::get('/', 'LandingController@index');
Route::auth();
Route::get('hook','webhookController@get');
Route::get('batch',function(){
$MailChimp = new MailChimp('3cd7d871232b41133d81ba538503f24b');
$batch = $MailChimp->get('/batches',['count'=>'20']);

foreach($batch['batches'] as $garbage){

	 $MailChimp->delete('/batches/'.$garbage['id']);
}
dd($MailChimp->get('/batches',['count'=>'20']));
});
Route::post('hook','webhookController@post');

Route::post('send', 'EmailController@send');
Route::post('/notify', 'EmailController@notify');

Route::get('/campaign/{campaignId}/generatepdf', 'CampaignController@generatepdf');
Route::get('/campaign/{campaignId}', 'CampaignController@details');

// authentication routes
Route::group(['middleware' => 'auth'], function () {

	Route::get('403', function()
{
    abort(403);
});

	// dashboard routes
	Route::get('/dashboard', 'DashboardController@index');
	
	// campaign routes
	Route::get('/campaign', 'CampaignController@index');
	
	Route::post('test', 'SubscriberController@csv');
	
	// subscribers routes
	Route::get('/subscribers', 'SubscriberController@lists');
	Route::get('/subscribers/{listId}', 'SubscriberController@listSubscribers');
	Route::get('/subscribers/{listName}/{subscriberId}', 'SubscriberController@subscriberProfile');
	Route::post('/subscriber/delete/{id}', 'SubscriberController@subscriberDelete');
	Route::post('/subscriber/update/{id}', 'SubscriberController@subscriberInfoUpdate');
	Route::post('/subscriber/add/{listId}', 'SubscriberController@subscriberAdd');
	Route::post('/subscriber/add/bulk/{listId}', 'SubscriberController@subscriberAddBulk');
	Route::post('/subscriber/list/add', 'SubscriberController@addList');
	Route::post('/subscriber/list/delete', 'SubscriberController@deleteList');
	
	// connections routes
	Route::get('/connections', 'ConnectionController@index');
	
	Route::get('/connections/add', 'ConnectionController@oauthShake');
	
	// profile routes
	Route::get('/profile', 'ProfileController@index');
	
	Route::post('/profile/update', 'ProfileController@update');
	
	Route::post('/profile/update/image', 'ProfileController@updateImage');
	
	// settings routes
	Route::get('/settings', 'SettingsController@index');
	
	Route::post('/settings/update/email', 'SettingsController@changeEmail');
	
	Route::post('/settings/update/password', 'SettingsController@changePass');

	
	Route::get('ajax', function(){
		$get = new MailChimp(\Auth::User()->OAuth);
		return $get->get('campaigns',['exclude_fields'=>'campaigns._links,_links']);
	});


	Route::get('faker',function(){
		$faker = Faker\Factory::create();
		$names ='';
		for($i=0;$i<20;$i++){
			$age = rand(18,50);
			if(rand(0,1)===1){
				$gender = 'Male';
			}else{
				$gender = 'Female';
			}
			$fname = $faker->firstName($gender);
			$linit = strtoupper($faker->randomLetter);
			$lname = $faker->lastName;

			echo "<pre>$fname,$linit,$lname,$fname$lname@growthhacklife.com,$age,$gender,$faker->streetName,$faker->city,$faker->state,$faker->country,$faker->postcode</pre>";
			$names .= "$fname$lname\n";

		}
		echo "<pre>$names</pre>";
	});


	

});
Route::get('/assets',function(Request $request){
	// dump($request->all());
	// //json_decode();
	// dd();
	return "hello world";
});
	
Route::get('upload',function(Request $request){
	// dump($request->all());
	// //json_decode();
	// dd();
	return view('player');
});