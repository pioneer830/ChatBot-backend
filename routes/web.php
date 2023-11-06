<?php

use App\Http\Controllers\API\V1\UserToneController;
use App\Http\Controllers\API\V1\UserIntentionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name('root');

Route::get('/contact', function () {
    return view('landing.contact');
})->name('contact');

Route::get('/faq', function () {
    return view('landing.faq');
})->name('faq');

Route::get('doc/{user}', function(string $admin){
    $type = $admin;
    if($type == 'admin'){
        return redirect('/request-docs/');
    }
    return redirect('/');

});

Route::get('/multi-select', function () {
    return view('user.multi-select');
})->name('multi-select');


Auth::routes();

Route::get('auth/google', [LoginController::class, 'googleLogin'])->name('auth.google');
Route::get('auth/google/callback', [LoginController::class, 'googleCallback'])->name('auth.google.callback');


//Register
Route::get('register', [RegisterController::class, 'index'])->name('register');

//logout

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

//Email route
Route::view('/email', 'email');

Route::get('/get/authorize/{unique_id}', [LoginController::class, 'getAuthorizeUser'])->name('get.auth');


Route::middleware(['auth','AuthSessionUpdate', 'prevent-back-history'])->group(function () {


    // cancel subscription plan
    Route::get('/subscription/cancel', [HomeController::class, 'showCancellationPage'])->name('showCancellationPage');
    Route::post('/api/v1/portal/set-default-plan', [HomeController::class, 'cancelSubscription'])->name('cancelSubscription');

    // For free,starter access
    Route::middleware(['UserPermission:customize'])->group(function (){

        Route::get('/customize', [HomeController::class, 'customize'])->name('customize');

    });

    Route::middleware(['UserPermission:customize_tones'])->group(function (){
        // tones
        Route::get('user-tone', [UserToneController::class, 'getUserToneView'])->name('tones.user-tone');
        Route::get('/list-of-tones', [UserToneController::class, 'getAllToneView'])->name('tones.list-of-tones');
        Route::get('tones/create', [UserToneController::class, 'getUserToneForm'])->name('tones.create');
        Route::post('tones/store', [UserToneController::class, 'addUserTone'])->name('tones.store');
        Route::delete('tones/delete', [UserToneController::class, 'deleteUserTone'])->name('tones.delete');
    });

    Route::middleware(['UserPermission:customize_intentions'])->group(function (){
        // intentions
        Route::get('/list-of-intentions', [UserIntentionController::class, 'getAllIntentionView'])->name('intentions.list-of-intentions');
        Route::get('intentions/create', [UserIntentionController::class, 'getUserIntentionForm'])->name('intentions.create');
        Route::get('user-intention', [UserIntentionController::class, 'getUserIntentionView'])->name('intentions.user-intention');
        Route::post('intentions/store', [UserIntentionController::class, 'addUserIntention'])->name('intentions.store');
        Route::delete('intentions/delete', [UserIntentionController::class, 'deleteUserIntention'])->name('intentions.delete');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/plans', [HomeController::class, 'plans'])->name('plans');
    Route::put('user/update/{user}', [HomeController::class, 'updateUserInfo'])->name('updateUserInfo');
    Route::get('user/payment/{plan}', [HomeController::class, 'payment'])->name('payment');
    Route::post('user/payment', [HomeController::class, 'doPayment'])->name('user.payment');
    Route::post('user/subscription', [HomeController::class, 'subscription'])->name('subscription');
    Route::get('/checkout/response/{session_id}/{plan}', [HomeController::class, 'responseCheckout'])->name('checkoutResponse');
    Route::get('/thank/you/{plan_name?}', [HomeController::class, 'thankYou'])->name('thank-you');




    Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
        Route::middleware(['only-admin-access'])->group(function (){
           //
        });


        Route::get('/', "\App\Http\Controllers\AdminController@index")->name('index');

        Route::group(['prefix' => 'plans', 'as' => 'plans.'], function () {
            Route::get('/', "\App\Http\Controllers\AdminController@planIndex")->name('index');
            Route::get('/create', "\App\Http\Controllers\AdminController@createPlan")->name('create');
            Route::get('/edit/{plan}', "\App\Http\Controllers\AdminController@editPlan")->name('edit');
            Route::put('/update/{plan}', "\App\Http\Controllers\AdminController@updatePlan")->name('update');
            Route::post('/store', "\App\Http\Controllers\AdminController@storePlan")->name('store');
            Route::delete('/delete/{plan}', "\App\Http\Controllers\AdminController@deletePlan")->name('delete');
        });
    });
});
