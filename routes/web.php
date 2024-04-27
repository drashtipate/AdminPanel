<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

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
//     return view('welcome');
// });

// Auth::routes();


// -----------------------------login-------------------------------//
// Route::prefix('mmladmin')->group (function () {
// 	Route::get('/', [loginController::class, 'login'])->name('login');
//     Route::post('/loginchek', [loginController::class, 'checkAdmin']);

//     Route::middleware(['admin'])->group(function () {
//         Route::get('/home', [loginController::class, 'index']);
//         Route::get('/logout', [loginController::class, 'logout']);
//     });
// });


// -----------------------------login-------------------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/', 'login')->name('login');
    Route::post('/loginchek', 'validate_login');
    Route::get('/logout', 'logout')->name('logout');
});

// -------------------------- main dashboard ----------------------//
Route::controller(LoginController::class)->group(function () {
    Route::get('/dashboard', 'index')->middleware('admin')->name('home');
   
});

// search
Route::controller(DashboardController::class)->group(function () {
    Route::get('/search', 'search');
});

// users
Route::middleware(['admin'])->group(function () {
    Route::get('/viewmembers', [DashboardController::class, 'viewmembers']);
    Route::get('delete/members/{id}', [DashboardController::class, 'deletemembers']);
    // useremail
    Route::get('/useremail', [DashboardController::class, 'usersemail']);
    Route::get('delete/email/{id}', [DashboardController::class, 'deleteuseremail']);
    // userchallenge
    Route::get('/userschallenge', [DashboardController::class, 'userschallenge']);
    Route::get('delete/userchallenge/{id}',[DashboardController::class, 'deleteuserschallenge']);
    // challenge
    Route::get('/challenge', [DashboardController::class, 'challenges']);
    Route::get('delete/challenge/{id}', [DashboardController::class, 'deletechallenge']);
});

// store
Route::middleware(['admin'])->group(function () {
    Route::get('/stores', [DashboardController::class, 'datastores']);
    Route::get('/store', [DashboardController::class, 'addstoredata']);
    Route::post('store/data',[DashboardController::class, 'insertstore']); 
    Route::get('edit/store/{id}', [DashboardController::class, 'editstoredata']);
    Route::PUT('update/store/{id}', [DashboardController::class, 'updatestoredate']);
    Route::get('delete/store/{id}', [DashboardController::class, 'deletestoredata']);
    Route::get('download/{id}', [DashboardController::class, 'download']);
    
});



//message
Route::middleware(['admin'])->group(function () {
    Route::get('/message', [DashboardController::class, 'message']);
    Route::post('store/message', [DashboardController::class, 'storeMessage']); 
    Route::get('edit/message/{id}', [DashboardController::class, 'editmessage']);
    Route::PUT('update/message/{id}', [DashboardController::class, 'updatemessage']);
    Route::get('delete/message/{id}', [DashboardController::class, 'deletemessage']);
    Route::get('/addmessage', [DashboardController::class, 'addmessage']);
});

// feedback
Route::middleware(['admin'])->group(function () {
    Route::get('/feedback', [DashboardController::class, 'feedback']);
    Route::post('store/feedback', [DashboardController::class, 'storeFeedback']);
    Route::get('delete/feedback/{id}', [DashboardController::class, 'deletefeedback']);
    Route::get('edit/feedback/{id}', [DashboardController::class, 'editfeedback']);
    Route::PUT('update/feedback/{id}', [DashboardController::class, 'updatefeedback']);
});

//changepassword
Route::middleware(['admin'])->group(function () {
    Route::match(['get','post'], '/updatepassword', [DashboardController::class, 'changePassword']);
});



