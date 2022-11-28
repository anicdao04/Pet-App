<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\AdaptionController;
use App\Http\Controllers\TriviaController;

use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MailController;

use Illuminate\Support\Facades\Auth;

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
//     return view('main');
// });

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function() {
    Auth::routes();
});


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/adopt', [HomeController::class, 'adopt'])->name('adopt');
Route::get('/trivia', [HomeController::class, 'trivia'])->name('trivia');

Route::get('/register', function(){
    return redirect('/login');
});


Route::group(['middleware' => ['auth']], function() {
    /**
    * Logout Route
    */
    Route::get('/logout', [LogoutController::class, 'perform'])->name('logout.perform');
 });

Route::group(['prefix'=>'admin', 'middleware'=>['isAdmin','auth','PreventBackHistory']], function(){
        Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
        Route::get('/pets', [PetController::class, 'index'])->name('pet.index');
        Route::get('/pets/create', [PetController::class, 'create'])->name('pet.create');
        Route::post('/pets/store', [PetController::class, 'store'])->name('pet.store');
        Route::get('/pets/modify/{id}', [PetController::class, 'edit'])->name('pet.edit');
        Route::put('/pets/update/{id}', [PetController::class, 'update'])->name('pet.update');
        Route::get('/pets/delete/{id}', [PetController::class, 'delete'])->name('pet.delete');


        Route::get('/trivia', [TriviaController::class, 'index'])->name('trivia.index');
        Route::get('/trivia/create', [TriviaController::class, 'create'])->name('trivia.create');
        Route::post('/trivia/store', [TriviaController::class, 'store'])->name('trivia.store');
        Route::get('/trivia/modify/{id}', [TriviaController::class, 'edit'])->name('trivia.edit');
        Route::put('/trivia/update/{id}', [TriviaController::class, 'update'])->name('trivia.update');
        Route::get('/trivia/delete/{id}', [TriviaController::class, 'delete'])->name('trivia.delete');


        Route::get('/request', [AdaptionController::class, 'index'])->name('request.index');
        Route::get('/request/preview/{id}', [AdaptionController::class, 'preview'])->name('request.preview');
        Route::get('/request/delete/{id}', [AdaptionController::class, 'delete'])->name('request.delete');
        Route::get('/request/approve/{id}', [AdaptionController::class, 'approve'])->name('request.approve');
        Route::get('/request/disapprove/{id}', [AdaptionController::class, 'disapprove'])->name('request.disapprove');
});
Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth', 'PreventBackHistory']], function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
});

Route::get('/pet/id/{id}', [App\Http\Controllers\HomeController::class, 'pet'])->name('pet');
Route::get('/pet/sendemail', [MailController::class, 'sendEmail'])->name('sendmail');