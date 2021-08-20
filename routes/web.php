<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Support\Facades\Route;

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


/*
|--------------------------------------------------------------------------
| One to one relationship
|--------------------------------------------------------------------------
*/

// insert address data
Route::get('/insert', function(){
    $user = User::find(1);

    $address = new Address(['name' => 'Gulshan Dhaka 1216, Bangladesh']);

    $user->address()->save($address);

});

// update data
Route::get('/update', function(){

    $address = Address::whereUserId(1)->first();
    $address->name = "Monipur 243 Dhaka";
    $address->update();

});

// read data
Route::get('/read', function(){
    $user = User::findOrFail(1);
    return $user->address->name;
});

// delete data
Route::get('/delete', function(){
    $user = User::findOrFail(1);
    $user->address()->delete();
    // address -> get one
    // address() -> get all
});
