<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ExpenditureController;
use App\Http\Controllers\HostelController;
use App\Http\Controllers\AnalysisController;
 use App\Http\Controllers\NotificationController;
 use App\Http\Controllers\TicketController;
 use App\Http\Controllers\PaymentController;
 use App\Http\Controllers\AdminController;


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

Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');

Route::group(['middleware' => ['revalidate_back_history']], function () {

    Route::get('/', 'HomeController@home')->name('home');
    Route::get('/hostels', 'HostelController@general')->name('hostels.general');


    Route::group(['prefix' => 'auth', 'middleware' => ['custom_guest']], function () {

        Route::get('/registration', 'AuthController@getRegister')->name('getRegister');
        Route::post('/registration', 'AuthController@postRegister')->name('postRegister');
        Route::post('/ajax-register', 'AuthController@ajaxRegister')->name('ajaxRegister');
        Route::post('/check_email_unique', 'AuthController@check_email_unique')->name('check_email_unique');
        Route::get('/verify-email/{verification_code}', 'AuthController@verify_email')->name('verify_email');
        Route::get('/login', 'AuthController@getLogin')->name('getLogin');
        Route::post('/login', 'AuthController@postLogin')->name('postLogin');
        Route::post('/ajax-login', 'AuthController@ajaxLogin')->name('ajaxLogin');
        Route::get('/forget-password', 'AuthController@getForgetPassword')->name('getForgetPassword');
        Route::post('/forget-password', 'AuthController@postForgetPassword')->name('postForgetPassword');
        Route::get('/reset-password/{reset_code}', 'AuthController@getResetPassword')->name('getResetPassword');
        Route::post('/reset-password/{reset_code}', 'AuthController@postResetPassword')->name('postResetPassword');
    });

    Route::get('/auth/logout', 'AuthController@logout')->name('logout')->middleware('custom_auth');

    Route::group(['prefix' => 'profile', 'middleware' => ['custom_auth']], function () {
        Route::get('/dashboard', 'ProfileController@dashboard')->name('dashboard');
        Route::get('/edit-profile', 'ProfileController@edit_profile')->name('edit_profile');
        Route::put('/edit-profile', 'ProfileController@update_profile')->name('update_profile');
        Route::get('/change-password', 'ProfileController@change_password')->name('change_password');
        Route::post('/update-password', 'ProfileController@update_password')->name('update_password');
        Route::get('/edit_userinfo', 'ProfileController@edit_userinfo')->name('edit_userinfo');
        Route::put('/updateUserinfo', 'ProfileController@updateUserinfo')->name('updateUserinfo');
        Route::get('/hostel_info_main', 'ProfileController@hostel_info_main')->name('hostel_info_main');
        Route::get('/hostel_info', 'ProfileController@hostel_info')->name('hostel_info');
        Route::put('/updatehostel_info', 'ProfileController@updatehostel_info')->name('updatehostel_info');
        Route::get('manager', 'ProfileController@manager')->name('manager');
        Route::get('/verify-email/{verification_code}', [ProfileController::class, 'verify_email'])->name('verify_email');

       
        
      
        Route::post('/hostel-owners/{id}/approve', 'ProfileController@approveHostelOwner')->name('hostel-owners.approve');
        Route::post('/hostel-owners/{id}/decline', 'ProfileController@declineHostelOwner')->name('hostel-owners.decline');
        Route::get('/admin/reviewsflagged-reviews', 'ProfileController@viewFlaggedReviews')->name('admin.reviews.flagged-reviews');
        Route::patch('/admin/reviews/{id}/unflag', 'ProfileController@unflagReview')->name('admin.reviews.unflag');
        Route::delete('/admin/reviews/{id}', 'ProfileController@deleteReview')->name('admin.reviews.delete');
        Route::get('/admin/charts', [AdminController::class, 'showCharts'])->name('showCharts');


        Route::delete('/hostel-owners/{id}', 'ProfileController@deleteHostelOwner')->name('hostel-owners.delete');
        Route::get('/index', 'ProfileController@index')->name('index');
        Route::post('/store', 'ProfileController@store')->name('store');
        Route::put('/update/{notification}', 'NotificationController@update')->name('update');
;

        Route::get('/search-user', 'ProfileController@searchUserForm')->name('search_user_form');
        Route::get('/search-user-results', 'ProfileController@searchUser')->name('searchUser');
        Route::post('/add-resident/{user_id}', 'ProfileController@addResident')->name('addResident');
        Route::get('/accept-invitation/{token}', 'ProfileController@acceptInvitation')->name('accept_invitation');
        Route::get('/viewResidents', 'ProfileController@viewResidents')->name('viewResidents');
        Route::delete('/remove-resident/{user_id}', 'ProfileController@removeResident')->name('removeResident');






   // web.php

Route::get('hostels/{id}', 'HostelController@show')->name('hostels.show');
Route::get('hostels/{id}/apply', 'HostelController@showApplicationForm')->name('hostels.showApplicationForm');
Route::patch('/hostels/{id}/flag', 'HostelController@flag')->name('hostels.flag');
Route::post('hostels/{id}/apply', 'HostelController@sendApplication')->name('hostels.sendApplication');
Route::get('hostels/{id}/review', 'HostelController@showReviewForm')->name('hostels.showReviewForm');
Route::post('hostels/{id}/review', 'HostelController@storeReview')->name('hostels.storeReview');





Route::get('/payment', [PaymentController::class, 'showPaymentForm'])->name('payment.form');
Route::post('/payment', [PaymentController::class, 'processPayment'])->name('payment.process');

    

    Route::middleware(['auth'])->group(function () {
        Route::get('/expenditures', [ExpenditureController::class, 'index'])->name('expenditures.index');
        Route::post('/expenditures', [ExpenditureController::class, 'store'])->name('expenditures.store');
        Route::delete('/expenditures/{expenditure}', [ExpenditureController::class, 'destroy'])->name('expenditures.destroy');
        Route::get('/expenditures/analysis', [ExpenditureController::class, 'analysis'])->name('expenditures.analysis');
    });
    Route::middleware('auth')->group(function () {
        Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
        Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notifications.create');
        Route::post('/notifications', [NotificationController::class, 'store'])->name('notifications.store');
        Route::get('/notifications/{notification}/edit', [NotificationController::class, 'edit'])->name('notifications.edit');
        Route::put('/notifications/{notification}', [NotificationController::class, 'update'])->name('notifications.update');
        Route::delete('/notifications/{notification}', [NotificationController::class, 'destroy'])->name('notifications.destroy');
        Route::get('/notifications/view', [NotificationController::class, 'view'])->name('notifications.view');

    });

    Route::middleware('auth')->group(function () {
        Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
        Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
        Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');
        Route::get('/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('tickets.edit');
        Route::put('/tickets/{ticket}', [TicketController::class, 'update'])->name('tickets.update');
        Route::delete('/tickets/{ticket}', [TicketController::class, 'destroy'])->name('tickets.destroy');
        Route::get('/profile/tickets/view', 'TicketController@view')->name('tickets.view');
        Route::put('/profile/tickets/{ticket}/mark-solved', 'TicketController@markSolved')->name('tickets.markSolved');

        

    });
    Route::get('/analytics', [AnalysisController::class, 'index'])->name('analytics.index');

    //Route::get('/admin/flagged-reviews', [AdminController::class, 'viewFlaggedReviews'])->name('admin.flagged-reviews');
    //Route::patch('/admin/reviews/{id}/unflag', [AdminController::class, 'unflagReview'])->name('admin.reviews.unflag');
    //Route::delete('/admin/reviews/{id}', [AdminController::class, 'deleteReview'])->name('admin.reviews.delete');
});


});