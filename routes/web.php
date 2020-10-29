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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/product/{slug}', 'HomeController@single')->name('product.single');

Route::get('/model', function (){
    //$products = \App\Product::all();

    // $user = new \App\User();
    // $user->name = 'Usuario Teste';
    // $user->email = 'teste@teste.com';
    // $user->password = bcrypt('12345678');
    // //return $user->save();

        //Como eu faria para pegar a loja de um usuário
        // $user = \App\User::find(6);
      // dd($user->store()->count());

        //PEGAR OS PRODUTOS DE UMA LOJA
        $loja = \App\Store::find(6);
        //return $loja->products;

        //PEGAR AS CATEGORIAS DE UMA LOJA

        // $categoria= \App\Category::find(1);
        // $categoria->products;
        

        //Criar uma loja para um usuário

        // $user = \App\User::find(10);
        // $store = $user->store()->create([
        //     'name'=>'Loja Teste',
        //     'description'=>'Loja teste de produtos de informática',
        //     'mobile_phone'=>'xx-xxxxx-xxxx',
        //     'phone'=>'xx-xxxxx-xxxx',
        //     'slug'=>'loja-teste'
        // ]);
        // dd($store);

        //Criar um produto para uma loja

        // $store = \App\Store::find(41);
        // $product = $store->products()->create([
        //     'name' => 'Notebook Dell',
        //     'description' => 'CORE I5 ',
        //     'body' => 'Qualquer coisa',
        //     'price' => 2999.99,
        //     'slug' => 'notebook dell',
        // ]);
        // dd($product);

        //Criar uma categoria

        //  \App\Category::create([
        //     'name'=>'Games',
        //     'slug'=>'games'
        // ]);
        // \App\Category::create([
        //     'name'=>'notebooks',
        //     'slug'=>'notebooks'
        // ]);

        // return App\Category::all();
        //Adicionar um produto para uma categoria ou vice-versa

        // $product = \App\Product::find(49);
        // dd($product->categories()->sync([2]));

            $product= \App\Product::find(49);

            return $product->categories;
    
       //return \App\User::all();
});
Route::group(['middleware' =>['auth']], function(){
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function(){

        // Route::prefix('stores')->name('stores.')->group(function(){
            
        //     Route::get('/', 'StoreController@index')->name('index');
        //     Route::get('/create', 'StoreController@create')->name('create');
        //     Route::post('/store', 'StoreController@store')->name('store');
        //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('/update/{store}', 'StoreController@update')->name('update');
        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
    
        // });
    
    
    
        Route::resource('stores','StoreController');
        Route::resource('products','ProductController');
        Route::resource('categories','CategoryController');

        Route::post('photos/remove','ProductPhotoController@removePhoto')->name('photo.remove');
    
        });

});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
