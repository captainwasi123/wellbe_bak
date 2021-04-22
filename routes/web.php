<?php

use Illuminate\Support\Facades\Route;

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

//Website
	Route::get('/', 'webController@index')->name('home');
	Route::get('/professionals', 'webController@professionals')->name('professionals');
	Route::get('/treatments', 'webController@treatments')->name('treatments');







// Authentication
	Route::get('/login', 'loginController@index');
	Route::post('/login', 'loginController@loginAttempt');

	Route::get('/logout', 'loginController@logout');


// Practitioner

	Route::prefix('practitioner')->middleware('practAuth')->namespace('practitioner')->group(function(){

		//Dashboard
		Route::get('/', 'practitionerController@index')->name('practitioner.dashboard');

		//Services
		Route::prefix('service')->group(function(){

			Route::get('/', 'servicesController@index')->name('practitioner.services');
			Route::get('/load/{id}', 'servicesController@loadService');
			Route::get('/detail/{id}', 'servicesController@loadServiceDetail');
			Route::get('/delete/{id}', 'servicesController@deleteService');
			Route::get('/edit/{id}', 'servicesController@editService');

			//Add Service
			Route::post('/add', 'servicesController@addService')->name('practitioner.services.add');
			Route::post('/update', 'servicesController@updateService')->name('practitioner.services.update');

			//Addons
			Route::prefix('addons')->group(function(){

				Route::post('/add', 'servicesController@addAddons')->name('practitioner.services.addons.add');
			});
		});

		//Schedule
		Route::prefix('schedule')->group(function(){

			Route::get('/my_availability', 'scheduleController@index')->name('practitioner.schedule');
		});

		//Profile
		Route::prefix('profile')->group(function(){

			Route::get('/', 'profileController@index')->name('practitioner.profile');
			Route::post('/profile-save', 'profileController@profile_save')->name('practitioner.profile.save');
		});

		// Booking
		Route::prefix('booking')->group(function(){

			Route::get('/upcomming', 'bookingController@upcomming_booking')->name('practitioner.booking.upcomming');
			Route::get('/inprogress', 'bookingController@inprogress_booking')->name('practitioner.booking.inprogress');
			Route::get('/completed', 'bookingController@completed_booking')->name('practitioner.booking.completed');
			Route::get('/cancelled', 'bookingController@cancelled_booking')->name('practitioner.booking.cancelled');
		});
	});


//Booker

	Route::prefix('booker')->namespace('booker')->middleware('bookerAuth')->group(function(){
		Route::get('/', 'bookingscontroller@index')->name('booker.index');
		Route::get('/upcomming', 'bookingscontroller@upcomming_booking')->name('booker.upcomming_booking');
		Route::get('/inprogress', 'bookingscontroller@inprogress_booking')->name('booker.inprogress_booking');
		Route::get('/completed', 'bookingscontroller@completed_booking')->name('booker.completed_booking');
		Route::get('/cancelled', 'bookingscontroller@cancelled_booking')->name('booker.cancelled_booking');
	
		Route::get('/profile', 'profilecontroller@index')->name('booker.profile');
	
		Route::get('/share', 'sharecontroller@index')->name('booker.share');
	});