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

// Authentication
	Route::get('/login', 'loginController@index');
	Route::post('/login', 'loginController@loginAttempt');



// Practitioner

	Route::prefix('practitioner')->middleware('practAuth')->namespace('practitioner')->group(function(){
		
		//Dashboard
		Route::get('/', 'practitionerController@index')->name('practitioner.dashboard');

		//Services
		Route::prefix('service')->group(function(){

			Route::get('/', 'servicesController@index')->name('practitioner.services');
		});

		//Schedule
		Route::prefix('schedule')->group(function(){

			Route::get('/my_availability', 'scheduleController@index')->name('practitioner.schedule');
		});

		//Profile
		Route::prefix('profile')->group(function(){

			Route::get('/', 'profileController@index')->name('practitioner.profile');
		});

		// Booking
		Route::prefix('booking')->group(function(){

			Route::get('/upcomming', 'bookingController@upcomming_booking')->name('practitioner.booking.upcomming');
			Route::get('/inprogress', 'bookingController@inprogress_booking')->name('practitioner.booking.inprogress');
			Route::get('/completed', 'bookingController@completed_booking')->name('practitioner.booking.completed');
			Route::get('/cancelled', 'bookingController@cancelled_booking')->name('practitioner.booking.cancelled');
		});
	});
