<?php

use App\Http\Controllers\AdController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\UserController;
use App\Models\Message;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Translation\MessageCatalogue;

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

Route::get('/', [AdController::class, 'index'])->name('welcome');
Route::get('/newAd', [AdController::class, 'showAdForm'])->name('newAd');
Route::post('/newAd', [AdController::class, 'createAd'])->name('newAd');
Route::get('/singleAd/{id}', [AdController::class, 'singleAd'])->name('singleAd');

Route::post('/sendMessage/{id}', [MessageController::class, 'sendMessage'])->name('sendMessage');
Route::get('/user/inbox', [MessageController::class, 'inbox'])->name('user.inbox');

Route::get('/user', [UserController::class, 'index'])->name('userProfile');
Route::get('/user/addDeposit', [UserController::class, 'showDepositForm'])->name('user.addDeposit');
Route::post('/user/addDeposit', [UserController::class, 'addDeposit'])->name('user.addDeposit');
Route::get('/user/adInfo/{id}', [UserController::class, 'adInfo'])->name('user.adInfo');
Route::get('/user/ad/{id}/delete', [UserController::class, 'deleteAd'])->name('user.deleteAd');


Auth::routes();
Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
