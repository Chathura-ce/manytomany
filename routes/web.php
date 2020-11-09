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
    $role = new Role(['name'=>'subscriber']);
    $user->roles()->save($role);
});

//Reading data
Route::get('/read',function (){
    $user = User::findOrFail(1);

//    dd($user->roles);

    foreach ($user->roles as $role){
        echo $role->name . "<br>";
    }
});

//update data
Route::get('/update',function (){
   $user = User::findOrFail(1);

   if ($user->has('roles')){
       foreach ($user->roles as $role){
           if ($role->name = 'Administrator'){
               $role->name = 'subscriber';
               $role->save();
           }
       }
   }
});

//delete data
Route::get('/delete',function (){
   $user = User::findOrFail(2);
//   $user->roles->delete(); delete everything
    foreach ($user->roles as $role){
        $role->whereId(2)->delete();
    }
});

//Attaching detaching and syncing
//          Attach
Route::get('/attach',function (){
    $user = User::findOrFail(1);
    $user->roles()->attach(2);
});

//          Detach
Route::get('/detach',function (){
    $user = User::findOrFail(1);
    $user->roles()->detach(2);
});

//          Sync
Route::get('/sync',function (){
    $user = User::findOrFail(2);
    $user->roles()->sync([2,3]);
});


