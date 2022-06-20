<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SwapController;
use App\Http\Controllers\StakeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminAuth\LoginController;

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
    return view('admin/login');
});

//Route for Login and Registration
Route::get('login', [RegisterController::class, 'log'])->name('login');
Route::post('login', [RegisterController::class, 'customLogin'])->name('login.custom');

Route::get('signout', [RegisterController::class, 'signOut'])->name('signout');
Route::get('registration', [RegisterController::class, 'registration'])->name('register');
Route::post('custom-registration', [RegisterController::class, 'customRegistration'])->name('register.custom');
//  Route::get('home', [RegisterController::class, 'customLogin'])->name('login.custom');
Route::group(['middleware' => 'auth'], function (){
     Route::get('home',[RegisterController::class, 'usercoin'])->name('welcome');
});
//Route for profile
Route::get('profile',[RegisterController::class, 'profileshow'])->name('profile');
Route::get('profile-edit',[RegisterController::class, 'profile_edit'])->name('profile.edit');
Route::post('profile-update',[RegisterController::class, 'profile_update'])->name('profile.update');

//Route for coin
Route::get('coin-buy',function () { return view('coin_buy'); })->name('coin.buy');
Route::post('totalprice',[RegisterController::class,'cal'])->name('totalprice');
Route::post('purchase-insert',[RegisterController::class,'purchase_insert'])->name('purchase.insert');
Route::get('purchase-details',[RegisterController::class,'purchase_details'])->name('purchase.details');
Route::get('coin-display',[RegisterController::class, 'coin_display'])->name('coin.display');
//Route::get('demo',[RegisterController::class, 'demo'])->name('demo');

//Sell Order and Buy Order
Route::get('coin-sellorder',[RegisterController::class, 'coin_sellorder'])->name('coin.sellorder');
Route::post('coin-sellorder',[RegisterController::class, 'coin_sellorderinsert'])->name('coin.sellorderinsert');
Route::get('coin-buyorder',[RegisterController::class, 'coin_buyorder'])->name('coin.buyorder');
Route::post('coin-buyorder',[RegisterController::class, 'coin_buyorderinsert'])->name('coin.buyorderinsert');

//Send Coin and Receive Coin
Route::get('send-coin',[RegisterController::class, 'sendcoin'])->name('sendcoin');
Route::post('send-coin',[RegisterController::class, 'sendcoin_insert'])->name('sendcoin.insert');
Route::get('receive-coin',[RegisterController::class, 'receivecoin'])->name('receivecoin');
Route::get('sendcoin-history',[RegisterController::class, 'sendcoin_history'])->name('coinsent.history');


//Swap Coin
Route::get('swap-coin',[SwapController::class, 'swapcoin'])->name('swapcoin');
Route::post('swap-value/{type}',[SwapController::class, 'swapvalue'])->name('swapvalue');

Route::get('admin',[StakeController::class, 'admin'])->name('admin');

//Stake

Route::resource('stake', StakeController::class);

Route::get('stake-plan',[StakeController::class, 'stake_plan'])->name('stake.plan');
Route::get('stake-add',[StakeController::class, 'stake_add'])->name('stake.add');
Route::get('/stake1-add/{id}',[StakeController::class, 'stake1_add'])->name('stake1.add');
Route::post('stake-insert/{mininves}',[StakeController::class, 'stake_store'])->name('stake.insert');
Route::get('user-stakehistory',[StakeController::class, 'user_stakehistory'])->name('user.stakehistory');
Route::get('admin-stakepurchase',[StakeController::class, 'admin_stakepurchase'])->name('admin.stakepurchase');







Route::group(['prefix' => 'admin'], function () {
  Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
  Route::post('/login', 'AdminAuth\LoginController@login');
  Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  Route::get('/register', 'AdminAuth\RegisterController@showRegistrationForm')->name('register');
  Route::post('/register', 'AdminAuth\RegisterController@register');

  Route::post('/password/email', 'AdminAuth\ForgotPasswordController@sendResetLinkEmail')->name('password.request');
  Route::post('/password/reset', 'AdminAuth\ResetPasswordController@reset')->name('password.email');
  Route::get('/password/reset', 'AdminAuth\ForgotPasswordController@showLinkRequestForm')->name('password.reset');
  Route::get('/password/reset/{token}', 'AdminAuth\ResetPasswordController@showResetForm');
});
