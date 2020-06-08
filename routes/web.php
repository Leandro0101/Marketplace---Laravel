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
Route::get('/products/{slug}', 'HomeController@single')->name('product.single');
Route::get('/', 'HomeController@index')->name('home');

Route::prefix('cart')->name('cart.')->group(function () {
    Route::post('add', 'CartController@add')->name('add');
    Route::get('/', 'CartController@index')->name('index');
    Route::get('remove/{slug}', 'CartController@remove')->name('remove');
    Route::get('cancel', 'CartController@cancel')->name('cancel');
});


//FORMA INICIAL

// Route::get('/model', function () {});
// Route::get('/admin/stores', 'Admin\\StoreController@index');
// Route::get('/admin/stores/create', 'Admin\\StoreController@create');
// Route::post('/admin/stores/store', 'Admin\\StoreController@store');

//FORMA MELHORADA

// Route::prefix('admin')->namespace('Admin')->group(function () {
//     Route::prefix('stores')->group(function(){
//         Route::get('/', 'StoreController@index');
//         Route::get('/create', 'StoreController@create');
//         Route::post('/store', 'StoreController@store');
//         Route::get('/{store}/edit', 'StoreController@edit');
//         Route::post('/update/{store}', 'StoreController@update');
//         Route::get('/destroy/{store}', 'StoreController@destroy');
//     });
// });

//FORMA MELHORADA COM APELIDOS DE ROTAS


// Route::prefix('admin')->namespace('Admin')->group(function () {
//     Route::prefix('stores')->group(function(){
//         Route::get('/', 'StoreController@index')->name('admin.stores.index');
//         Route::get('/create', 'StoreController@create')->name('admin.stores.create');
//         Route::post('/store', 'StoreController@store')->name('admin.stores.store');
//         Route::get('/{store}/edit', 'StoreController@edit')->name('admin.stores.edit');
//         Route::post('/update/{store}', 'StoreController@update')->name('admin.stores.update');
//         Route::get('/destroy/{store}', 'StoreController@destroy')->name('admin.stores.destroy');
//     });
// });

//MELHORANDO AINDA MAIS KKKK


Route::prefix('checkout')->name('checkout.')->group(function () {
    Route::get('/', 'CheckoutController@index')->name('index');
    Route::post('/proccess', 'CheckoutController@proccess')->name('proccess');
});
Route::group(['middleware' => ['auth']], function () {
    Route::prefix('admin')->name('admin.')->namespace('Admin')->group(function () {
        // Route::prefix('stores')->name('stores.')->group(function(){
        //     Route::get('/', 'StoreController@index')->name('index');
        //     Route::get('/create', 'StoreController@create')->name('create');
        //     Route::post('/store', 'StoreController@store')->name('store');
        //     Route::get('/{store}/edit', 'StoreController@edit')->name('edit');
        //     Route::post('/update/{store}', 'StoreController@update')->name('update');
        //     Route::get('/destroy/{store}', 'StoreController@destroy')->name('destroy');
        // });
        Route::resource('stores', 'StoreController');
        Route::resource('products', 'ProductController');
        Route::resource('categories', 'CategoryController');
        Route::post('photos/remove', 'ProductPhotoController@removePhoto')->name('photo.remove');
    });
});



//Route::get - retorna
//Route::post - cria
//Route::put - atualização
//Route::patch - atualização
//Route::delete - remoção
//Route::options - cabeçalhos que aquela rota responde

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
