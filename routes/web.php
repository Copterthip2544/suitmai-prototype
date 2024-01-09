<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\IngredientsController;
use App\Http\Controllers\RecommendController;
use App\Http\Controllers\UserManageController;
use App\Http\Controllers\UserController;
use App\Models\User;
use App\Models\Role;

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
});

Auth::routes();

//sidebar menu
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('Home');
Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('Profile');
Route::get('/mix', [App\Http\Controllers\MixController::class, 'index'])->name('Mix');
Route::get('/review', [App\Http\Controllers\ReviewController::class, 'index'])->name('Review');

//upload image profile
Route::post('/upload-avatar', [App\Http\Controllers\ProfileController::class,'uploadAvatar'])->name('upload-avatar');

//admin login
Route::get('/setup-admin', [AdminController::class, 'setupAdmin']);

//admin page
// Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
// Route::get('/admin/dashboard', 'AdminController@dashboard')->middleware(['admin']);
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.home');


//admin check
Route::get('/admin/dashboard', 'AdminController@dashboard')
    ->name('admin.dashboard')
    ->middleware(['auth', 'admin']); 


Route::get('/admin/dashboard', 'AdminController@dashboard')->middleware('role:admin');
Route::get('/user/dashboard', 'UserController@dashboard')->middleware('role:user');

Route::middleware(['auth', 'checkRole:admin'])->group(function () {
    Route::get('/admin/dashboard', 'AdminController@dashboard')->name('admin.dashboard');
});

// Route::middleware(['auth', 'checkRole:user'])->group(function () {
//     Route::get('/user/dashboard', 'UserController@dashboard')->name('Home');
// });

//admin save ingredients
//Route::post('/add-ingredient', 'IngredientController@addIngredient')->name('add-ingredient');
//Route::post('/add-ingredient', [IngredientsController::class, 'addIngredient']);
// Route::get('/ingredients', 'IngredientController@index')->name('ingredients.index');
// Route::get('/ingredients/create', 'IngredientController@create')->name('ingredients.create');
// Route::post('/ingredients', 'IngredientController@store')->name('ingredients.store');
// Route::get('/admin/dashboard', [AdminController::class, 'showDashboard'])->name('admin.dashboard');
// Route::post('/admin/add-ingredient', [AdminController::class, 'addIngredient'])->name('admin.add-ingredient');
Route::get('/ingredients', 'IngredientController@showIngredients');

//admin recommend menu
//Route::post('/add-recommend', [RecommendController::class, 'addRecommend'])->name('addRecommend');

// User management
Route::get('/admin/usermanage', [UserManageController::class, 'index'])->name('usermanage');;
// User Delete
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');
Route::get('/users', [UserController::class, 'index'])->name('user.index');