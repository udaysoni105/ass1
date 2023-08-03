<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PagesController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about',function(){
    return view('pages.about');
});

//Redirect route
Route::redirect('/here', '/there');

//view route
Route::view('/welcome', 'welcome');

//route group
Route::group([], function()  
{  
   Route::get('/first',function()  
 {  
   echo "first route";  
 });  
Route::get('/second',function()  
 {  
   echo "second route";  
 });  
Route::get('/third',function()  
 {  
   echo "third route";  
 });  
});  

//Route Prefix
Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    });
    Route::get('users',[PagesController::class, 'index']);
});

//Rate Limiting
Route::middleware(['throttle:5,1'])->group(function () {
    Route::get('/api', function () {
        return ['data' => 'Some data'];
    });
});

//route parameters
Route::get('/users/{id}/{name}', function ($id, $name) {
    return "User $id and  $name";
});

//all routes
// Route::get('/users', [PostController::class, 'index']);
// Route::post('/users', [PostController::class,'store']);
// Route::put('/users/{id}', [PostController::class,'update']);
// Route::patch('/users/{id}', [PostController::class,'update']);
// Route::delete('/users/{id}', [PostController::class,'destroy']);

//Create view for get,post 
Route::get('/users',[UserController::class,'getData']);
Route::post('/users/{id}/{name}',[UserController::class,'getData']);
Route::view('/login','login');