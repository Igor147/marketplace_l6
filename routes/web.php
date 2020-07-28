<?php

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

use App\User;

Route::get('/', function () {
    $helloWorld = 'Hello Word!';
    return view('welcome', ['helloWorld'=> $helloWorld]);
});

Route::get('/model', function(){
    $products = \App\Product::all();

   // $user = new \App\User();
    $user = \App\User::find(1);
    $user->name = 'Usuario Teste Editado';
    $user->save();

   // \App\User::all
   // return  \App\User::find('3')
   // \App\User::where('name', 'Verona McDermott I')->first()
   // \App\User::paginate(10)

   //Mass Assignment

//    $user = \App\User::create([
//         'name' => 'Nanderson Castro',
//         'email' => 'email100@email.com',
//         'password' => bcrypt('1234566')
//    ]);

    //Mass Update

    $user = \App\User::find(42);
    $user->update([
        'name' => 'Atualizando com Mass Update'
    ]);
dd($user);
    return \App\User::all();
});