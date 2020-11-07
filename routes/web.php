<?php

use App\Models\Role;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});


//Insert data
Route::get('/create',function (){
    $user = User::find(1);
    $role = new Role(['name'=>'Administrator']);
    $user->roles()->save($role);
});
