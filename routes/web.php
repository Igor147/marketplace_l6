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

use App\Store;
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

    // $user = \App\User::find(42);
    // $user->update([
    //     'name' => 'Atualizando com Mass Update'
    // ]);

    // $user = \App\User::find(4);

    // dd( $user->store()->count());

    // $loja = \App\Store::find(1);
    // return $loja->products()->where('id',1)->get();

    // $categoria = \App\Category::find(1);
    // $categoria->products;

    // $user = \App\User::find(10);
    // $store = $user->store()->create([
    //     'name' => 'Loja Teste',
    //     'description' => 'Loja teste produtos informatica',
    //     'mobile_phone' => 'xx-xxxx-xxxx',
    //     'phone' => 'xx-xxx-xxxx',
    //     'slug' => 'loja-teste'
    // ]);

//    $store = \App\Store::find(42);
//    $product = $store->products()->create([
//     'name' => 'Notebook Dell',
//     'description' => 'Core I5 10gb',
//     'body' => 'Qualquer coisa',
//     'price' => 2999.90,
//     'slug' => 'notebook-dell',
//    ]);

//     dd($product);




    // \App\Category::create([
    //     'name' => 'Games',
    //     'description' => null,
    //     'slug' => 'games'
    // ]);

    // \App\Category::create([
    //     'name' => 'Notebook',
    //     'description' => null,
    //     'slug' => 'notebook'
    // ]);

    // return \App\Category::all();

    // $product = \App\Product::find(49);
    // dd($product->categories()->sync([2]));

    return \App\User::all();
});


Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

    // Route::prefix('stores')->name('stores.')->group(function(){
    //     Route::get('/','StoreController@index')->name('index');   
    //     Route::get('/create','StoreController@create')->name('create'); 
    //     Route::post('/store','StoreController@store')->name('store'); 
    //     Route::get('/{store}/edit','StoreController@edit')->name('edit'); 
    //     Route::post('/update/{store}','StoreController@update')->name('update'); 
    //     Route::get('/destroy/{store}','StoreController@destroy')->name('destroy');
    // });
    
    Route::resource('stores', 'StoreController');
    Route::resource('products', 'ProductController');
});