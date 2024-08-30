<?php

use App\Models\User;
use App\Models\Permission;
use Illuminate\Support\Facades\Route;

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
Route::get('many-to-many', function () {
// dd(Permission::create(['name' => 'menu_04']));

$user = User::with('permissions')->find(1);

$permission = Permission::find(1);
// $user->permissions()->save($permission);
// $user->permissions()->saveMany([
//     Permission::find(1),
//     Permission::find(3),
//     Permission::find(2)
// ]);

// $user->permissions()->sync([2]);
//  $user->permissions()->attach([1,3]);
$user->permissions()->detach([1,3]);
$user->refresh();

dd($user->permissions);
});

Route::get('many-to-many-pivot', function(){

});
Route::get('/', function () {
    return view('welcome');
});
