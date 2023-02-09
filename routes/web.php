<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuParentController;
use App\Http\Controllers\MenuChildController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RecipeController;

use App\Http\Controllers\LogoutController;

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


// Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/', function(){
    return redirect('/login');
});

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
        Route::get('order', [OrderController::class, 'parent'])->name('orderparent.index');
        Route::get('/order/o_id/{id}', [OrderController::class, 'menu'])->name('ordermenu.index');

        Route::get('recipe', [RecipeController::class, 'index'])->name('recipe.index');
        Route::get('recipe/{id}', [RecipeController::class, 'recipe_id'])->name('recipe_id');
        Route::get('recipe/{id}/register', [RecipeController::class, 'register']);

        Route::get('menu/parent/list', [MenuParentController::class, 'index'])->name('menuparent.index');
        Route::get('menu/parent/create', [MenuParentController::class, 'create'])->name('menuparent.create');
        Route::post('menu/parent/store', [MenuParentController::class, 'store'])->name('menuparent.store');

        Route::get('menu/child/list', [MenuChildController::class, 'index'])->name('menuchild.index');
        Route::get('menu/child/create', [MenuChildController::class, 'create'])->name('menuchild.create');
        Route::post('menu/child/store', [MenuChildController::class, 'store'])->name('menuchild.store');
        Route::get('menu/child/edit/{id}', [MenuChildController::class, 'edit'])->name('menuchild.edit');
        Route::put('menu/child/update/{id}', [MenuChildController::class, 'update'])->name('menuchild.update');

});
Route::group(['prefix'=>'user', 'middleware'=>['isUser','auth', 'PreventBackHistory']], function(){
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
});
