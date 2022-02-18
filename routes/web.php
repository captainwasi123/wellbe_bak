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

//Website Routes
	Route::namespace('web')->group(function(){
		Route::get('/', 'webController@index')->name('home');
		Route::get('/work_with_us', 'webController@workWithUs')->name('work_with_us');
        Route::get('/ourStory', 'webController@ourStory')->name('ourStory');
        Route::get('/contact_us', 'webController@countactUs')->name('countact_us');
		Route::post('/contact_us', 'webController@countactUsmail')->name('countact_us');
        Route::get('/faq', 'webController@FAQ')->name('faq');
        Route::get('/TermCondition', 'webController@TermCondition')->name('TermCondition');
        Route::get('/PractitionerAgree', 'webController@PractitionerAgree')->name('PractitionerAgree');
        Route::get('/PrivacyPolicy', 'webController@PrivacyPolicy')->name('PrivacyPolicy');
        Route::get('/CookiePolicy', 'webController@CookiePolicy')->name('CookiePolicy');

		

		


		//Authentication
		Route::get('/login', 'loginController@login');
	    Route::post('/login', 'loginController@loginAttempt');
		Route::get('/register', 'loginController@register');
		Route::get('/register/pro', 'loginController@registerPro');
		Route::post('/register', 'loginController@registerSubmit');




		Route::get('forget-password', 'loginController@showForgetPasswordForm')->name('forget.password.get');
		Route::post('forget-password', 'loginController@submitForgetPasswordForm')->name('forget.password.post');
		 Route::get('reset-password/{token}', 'loginController@showResetPasswordForm')->name('reset.password.get');
		Route::post('reset-password', 'loginController@submitResetPasswordForm')->name('reset.password.post');



		//Treatments
		Route::prefix('treatments')->group(function(){
			Route::get('/', 'treatmentController@treatments')->name('treatments');
			Route::get('/search', 'treatmentController@treatments_search')->name('treatments.search');
			Route::get('/{category}', 'treatmentController@treatmentsCategory');
			Route::get('/professional/profile/{id}', 'treatmentController@professionalProfile')->name('professional.profile');

			Route::prefix('services')->group(function(){

				Route::get('/{id}', 'treatmentController@serviceDetails');

				Route::post('addToCart', 'treatmentController@addToCartService')->name('treatments.services.addToCart');
				Route::get('removeItem/{id}', 'treatmentController@removeItemCart');

				Route::prefix('addons')->group(function(){

					Route::get('/{id}', 'treatmentController@serviceAddons');
				});
			});

			Route::prefix('booking')->group(function(){

				Route::post('step_1', 'bookingController@step1Session')->name('treatments.booking.step1');
				Route::get('step_1', 'bookingController@step1')->name('treatments.booking.step1');
				Route::post('step_1/summary', 'bookingController@step1Summary');

				Route::post('step_2', 'bookingController@step2Session')->name('treatments.booking.step2');
				Route::get('step_2', 'bookingController@step2')->name('treatments.booking.step2');

				Route::post('instruction', 'bookingController@instructions')->name('treatments.booking.instruction');

				//Professional
				Route::get('profile/{id}', 'bookingController@viewProfile');
				Route::post('getProfessionals', 'bookingController@getProfessionals');
			});
		});


	});





//Website
	Route::get('/professionals', 'webController@professionals')->name('professionals');


	//Services
	Route::get('/user/services/{userid}/{cat_id}', 'webController@user_services');

	Route::post('/add_cart','webController@add_cart')->name('add_cart');
	Route::get('/cart_update/{row_id}', 'webController@cart_update');

	Route::get('/user/slots/{date}/{user_id}', 'webController@get_slots');

//booking reminder route
	Route::get('/booking-reminder', 'webController@booking_reminder')->name('booking.reminder');

	// Authentication
		Route::post('/loginAttempt2', 'loginController@ajaxloginAttempt2');
		Route::get('/logout', 'loginController@logout');
		Route::get('/user-active/{id}','loginController@user_active')->name('user_active');


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

			Route::get('/enable/{id}', 'servicesController@enableService');
			Route::get('/disable/{id}', 'servicesController@disableService');

			Route::post('/update', 'servicesController@updateService')->name('practitioner.services.update');


			//Addons
			Route::prefix('addons')->group(function(){

				Route::post('/add', 'servicesController@addAddons')->name('practitioner.services.addons.add');

				Route::get('/enable/{id}', 'servicesController@enableServiceAddon');
				Route::get('/disable/{id}', 'servicesController@disableServiceAddon');
				Route::get('/edit/{id}', 'servicesController@editServiceAddon');

				Route::post('/update', 'servicesController@updateServiceAddon')->name('practitioner.services.addon.update');
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

			Route::get('/upcoming', 'bookingController@upcomming_booking')->name('practitioner.booking.upcomming');
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
		Route::get('/upcoming', 'bookingsController@upcomming_booking')->name('booker.upcomming_booking');
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
		Route::get('/order/book', 'bookingsController@bookOrder')->name('booker.order');
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
	    Route::get('/upcoming', 'DashboardController@upcomming')->name('admin.upcomming');
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
	    Route::get('/customersExport', 'DashboardController@customersExport')->name('admin.customers.export');

	    //Practitioner
	    Route::prefix('practitioners')->group(function(){

	    	Route::get('/', 'DashboardController@practitioners')->name('admin.practitioners');
	    	Route::post('/disable', 'DashboardController@disablePractitioners')->name('admin.practitioners.disable');
	    	Route::post('/assume', 'DashboardController@assumePractitioners')->name('admin.practitioners.assume');
			Route::get('/portal/{id}', 'DashboardController@practitioners_portal')->name('admin.practitioners.portal');


			Route::get('/manageCategory/{id}', 'DashboardController@manageCategory');
			Route::post('/manageCategory/update', 'DashboardController@manageCategoryUpdate')->name('admin.practitioners.manageCategory.update');
	    });

		//services

			Route::get('/manage_services/{id}', 'ServicesController@manage_services')->name('admin.manage_services');

			Route::prefix('services')->group(function(){

				Route::get('/detail/{id}', 'ServicesController@loadServiceDetail');
				Route::get('/delete/{id}', 'ServicesController@deleteService');
				Route::get('/edit/{id}', 'ServicesController@editService');

				Route::get('/disable/{id}', 'ServicesController@disableService');
				Route::get('/enable/{id}', 'ServicesController@enableService');

				//Add Service
				Route::post('/add', 'ServicesController@addService')->name('admin.services.add');
				Route::post('/update', 'ServicesController@updateService')->name('admin.services.update');

				//Addons
				Route::prefix('addons')->group(function(){

					Route::post('/add', 'ServicesController@addAddons')->name('admin.services.addons.add');
					Route::post('/update', 'ServicesController@updateAddons')->name('admin.services.addons.update');

					Route::get('/delete/{id}', 'ServicesController@deleteServiceAddon');
					Route::get('/edit/{id}', 'ServicesController@editServiceAddon');

					Route::get('/enable/{id}', 'ServicesController@enableServiceAddon');
					Route::get('/disable/{id}', 'ServicesController@disableServiceAddon');
				});
			});



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

