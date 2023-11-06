<?php

use App\Http\Controllers\API\V1\AboutController;
use App\Http\Controllers\API\V1\OpenAiController;
use App\Http\Controllers\API\V1\UserCharacterLengthController;
use App\Http\Controllers\API\V1\UserController;
use App\Http\Controllers\API\V1\UserIntentionController;
use App\Http\Controllers\API\V1\UserToneController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('image/parse', [App\Http\Controllers\ApiController::class, 'getImageToText']);

Route::post('user/register/guest', [App\Http\Controllers\ApiController::class, 'guestRegister']);
Route::post('user/status', [App\Http\Controllers\ApiController::class, 'getStatus']);
Route::post('user/update', [App\Http\Controllers\ApiController::class, 'updateStatus']);
Route::post('user/login', [App\Http\Controllers\ApiController::class, 'userLogin']);
Route::get('user/login/status/{token}', [App\Http\Controllers\ApiController::class, 'getUserLoginStatusByToken'])->name('get.user.login.status');
Route::get('user/guest/info', [App\Http\Controllers\ApiController::class, 'getGuestUserContent'])->name('get.guest.user');
Route::put('user/updateData/{user}', [App\Http\Controllers\ApiController::class, 'updateUserData'])->name("updateUserDataApi");
Route::post('user/validEmail', [App\Http\Controllers\ApiController::class, 'validEmailCheck'])->name("validEmailCheck");


Route::middleware([])
    ->prefix('/v1/portal/')
    ->group(function(){
        Route::post('search-openai', [OpenAiController::class, 'searchOpenAi'])->name('search-openai');

        Route::post('status/tone-intention', [UserToneController::class, 'toneIntentionStatus'])->name('status.tone-intention');

        Route::post('get-user-about', [AboutController::class, 'getUserAbout'])->name('about');
        Route::post('store-user-about', [AboutController::class, 'storeUserAbout'])->name('store-user-about');
        Route::delete('delete-user-about', [AboutController::class, 'deleteUserAbout'])->name('delete-user-about');

        Route::get('get-all-tone', [UserToneController::class, 'getAllTone'])->name('get-all-tone');
        Route::post('get-user-tone', [UserToneController::class, 'getUserTone'])->name('get-user-tone');
        Route::post('add-user-tone', [UserToneController::class, 'addUserTone'])->name('add-user-tone');
        Route::delete('delete-user-tone', [UserToneController::class, 'deleteUserTone'])->name('delete-user-tone');

        Route::get('get-all-intention', [UserIntentionController::class, 'getAllIntention'])->name('get-all-intention');
        Route::post('get-user-intention', [UserIntentionController::class, 'getUserIntention'])->name('get-user-intention');
        Route::post('add-user-intention', [UserIntentionController::class, 'addUserIntention'])->name('add-user-intention');
        Route::delete('delete-user-intention', [UserIntentionController::class, 'deleteUserIntention'])->name('delete-user-intention');

         Route::get('get-all-character', [UserCharacterLengthController::class, 'getAllCharacterLength'])->name('get-all-character');
        Route::post('get-user-character', [UserCharacterLengthController::class, 'getUserCharacterLength'])->name('get-user-character');
        Route::post('add-user-character', [UserCharacterLengthController::class, 'addUserCharacterLength'])->name('add-user-character');
        Route::delete('delete-user-character', [UserCharacterLengthController::class, 'deleteUserCharacterLength'])->name('delete-user-character');

        Route::post('insert-multi-tones', [UserToneController::class, 'insertMultiTones'])
            ->name('insert.multi.tones');
        Route::post('insert-multi-intentions', [UserIntentionController::class, 'insertMultiIntentions'])
            ->name('insert.multi.intentions');

        Route::post('set-default-plan', [UserController::class, 'setDefaultPlan'])
            ->name('insert.multi.intentions');


    });
