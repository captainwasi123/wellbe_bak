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

	//Treatments
	Route::get('/treatments', 'webController@treatments')->name('treatments');
	Route::get('/treatments/{category}', 'webController@treatmentsCategory');
	Route::get('/treatments/professional/profile/{id}', 'webController@professionalProfile');

	//Services
	Route::get('/user/services/{userid}/{cat_id}', 'webController@user_services');
	Route::post('/add_cart','webController@add_cart')->name('add_cart');
	Route::get('/user/slots/{date}/{user_id}', 'webController@get_slots');


	// Authentication
		Route::get('/login', 'loginController@index');
		Route::post('/login/', 'loginController@loginAttempt');
	    Route::post('/loginAttempt', 'loginController@ajaxloginAttempt');
		Route::get('/logout', 'loginController@logout');

		Route::post('/register', 'loginController@userRegister');


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
			Route::post('/my_availability/save', 'scheduleController@save')->name('practitioner.schedule.save');
		});

		//Profile
		Route::prefix('profile')->group(function(){

			Route::get('/', 'profileController@index')->name('practitioner.profile');
			Route::post('/profile-save', 'profileController@profile_save')->name('practitioner.profile.save');
            
            Route::post('/change-password', 'profileController@change_password')->name('practitioner.profile.change_password');

            Route::get('/geofences', 'profileController@geofences')->name('practitioner.geofences');
            Route::post('/geofences/save', 'profileController@geofences_save')->name('practitioner.geofences.save');
		});

		// Booking
		Route::prefix('booking')->group(function(){

			Route::get('/upcomming', 'bookingController@upcomming_booking')->name('practitioner.booking.upcomming');
			Route::get('/inprogress', 'bookingController@inprogress_booking')->name('practitioner.booking.inprogress');
			Route::get('/completed', 'bookingController@completed_booking')->name('practitioner.booking.completed');
			Route::get('/cancelled', 'bookingController@cancelled_booking')->name('practitioner.booking.cancelled');

			Route::post('/cancel', 'bookingController@bookingCancel')->name('practitioner.booking.cancel');

			//Response
			Route::get('/view1/{id}', 'bookingController@bookingView1');

			//Start Service
			Route::get('/start/{id}', 'bookingController@bookingStart');

			//Booking Complete
			Route::get('/complete/{id}', 'bookingController@bookingComplete');
		});

		//plan
		Route::prefix('plan')->group(function(){

			Route::get('/', 'PlanController@index')->name('practitioner.plan');
			Route::get('/plan-buy/{id}','PlanController@plan_buy')->name('practitioner.plan.buy');
			Route::get('/confirm/{id}','PlanController@plan_confirm');
		});
	});


//Booker

	Route::prefix('booker')->namespace('booker')->middleware('bookerAuth')->group(function(){
		Route::get('/', 'bookingsController@index')->name('booker.index');
		Route::get('/upcomming', 'bookingsController@upcomming_booking')->name('booker.upcomming_booking');
		Route::get('/inprogress', 'bookingsController@inprogress_booking')->name('booker.inprogress_booking');
		Route::get('/completed', 'bookingsController@completed_booking')->name('booker.completed_booking');
		Route::get('/cancelled', 'bookingsController@cancelled_booking')->name('booker.cancelled_booking');

		Route::post('/booking/cancel', 'bookingsController@bookingCancel')->name('booker.booking.cancel');

		Route::post('/booking/rating', 'bookingsController@bookingRating')->name('booker.booking.rating');

		//Response
		Route::get('/view/{id}', 'bookingsController@bookingView1');

		Route::get('/profile', 'profileController@index')->name('booker.profile');
		Route::post('/profile-save', 'profileController@profile_save')->name('booker.profile.save');
        Route::post('/change_password', 'profileController@change_password')->name('booker.profile.update_password');

		Route::get('/share', 'shareController@index')->name('booker.share');

		//Book an order
		Route::post('/order/book', 'bookingsController@bookOrder')->name('booker.order');
		Route::get('/order/confirmation/{id}', 'bookingsController@confirmOrder');

	});

//Chat

	Route::prefix('chat')->namespace('chat')->middleware('chatAuth')->group(function(){

		Route::get('conversation/{order}', 'chatController@conversation');

		Route::post('send', 'chatController@sendChat')->name('chat.send');
	});


//Payments

	Route::prefix('payments')->namespace('payments')->group(function(){

		//Stripe
			Route::post('stripe', 'stripeController@paymentCharge')->name('payment.stripe.charge');
	});


//Admin

	//Authentication
	Route::prefix('admin')->group(function () {
		Route::get('login', 'AdminLoginController@index')->name('admin.login');
		Route::post('login', 'AdminLoginController@loginAttempt');
		Route::get('logout', 'AdminLoginController@logout')->name('admin.logout');
	});

	Route::prefix('admin')->middleware('adminAuth')->namespace('admin')->group(function () {

	    Route::get('/', 'DashboardController@index')->name('admin.dashboard');
	    Route::get('/upcomming', 'DashboardController@upcomming')->name('admin.upcomming');
	    Route::get('/inprogress', 'DashboardController@inprogress')->name('admin.inprogress');
	    Route::get('/completed', 'DashboardController@completed')->name('admin.completed');
	    Route::get('/cancelled', 'DashboardController@cancelled')->name('admin.cancelled');

	    Route::get('/booking/markaspaid/{id}', 'DashboardController@bookingMarkasPaid');
	    Route::get('/booking/unmarkaspaid/{id}', 'DashboardController@bookingUnmarkasPaid');
	    Route::post('/booking/cancel', 'DashboardController@bookingCancel')->name('admin.booking.cancel');

	    //Cancel Marking
	    Route::prefix('bookingCancel')->group(function(){

	    	//Customer
	    	Route::get('customer/mark/{id}', 'DashboardController@cancelMarkCust');
	    	Route::get('customer/unmark/{id}', 'DashboardController@cancelunMarkCust');

	    	//Practitioner
	    	Route::get('practitioner/mark/{id}', 'DashboardController@cancelMarkPract');
	    	Route::get('practitioner/unmark/{id}', 'DashboardController@cancelunMarkPract');
	    });


		//Response
		Route::get('/view/{id}', 'DashboardController@bookingView1');

	    Route::get('/customers', 'DashboardController@customers')->name('admin.customers');

	    //Practitioner
	    Route::prefix('practitioners')->group(function(){

	    	Route::get('/', 'DashboardController@practitioners')->name('admin.practitioners');
	    	Route::post('/disable', 'DashboardController@disablePractitioners')->name('admin.practitioners.disable');
	    	Route::post('/assume', 'DashboardController@assumePractitioners')->name('admin.practitioners.assume');
	    });

		//services
		Route::get('/custom_services', 'ServicesController@custom_services')->name('admin.custom_services');
		Route::get('/custom_services/update', 'ServicesController@custom_services_update')->name('admin.custom_services.update');

		// categories
        Route::get('/categories', 'CategoryController@index')->name('admin.categories');
        Route::POST('/add_categories', 'CategoryController@add_categories')->name('admin.add_categories');
        Route::get('/edit_category/{id}', 'CategoryController@edit_category')->name('admin.edit_category');
		Route::get('/delete_category/{id}', 'CategoryController@delete_category')->name('admin.delete_category');

		// End categories
	    Route::get('/marketplace_catalogue', 'DashboardController@marketplace_catalogue')->name('admin.marketplace_catalogue');

		//profile
		Route::get('/edit_profile', 'DashboardController@edit_profile')->name('admin.edit_profile');
		Route::post('/update_profile', 'DashboardController@update_profile')->name('admin.update_profile');
        Route::post('/change_password', 'DashboardController@change_password')->name('admin.change_password');

		//comission
		Route::post('/update/comission', 'DashboardController@update_comission')->name('admin.update.comission');

		Route::get('/categories', 'CategoryController@index')->name('admin.categories');
	});

