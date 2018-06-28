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

Auth::routes();

Route::get('/storageLink', function () {
  \Artisan::call('storage:link');
});

// Admin
Route::get('/admin', 'HomeController@indexAdmin');

// Publico
Route::get('/', 'HomeController@index')->name('home')->middleware('setlocale');

Route::get('/estudio', 'HomeController@us');
Route::get('/contacto', 'HomeController@contactUs');
Route::get('/tienda', 'HomeController@store');

// rutas frente
Route::get('/proyectos/{id}', 'ProjectsController@projectDescription');
Route::get('/proyectos/{tag}', 'ProjectsController@listProjectsByTag');

Route::group( [ 'middleware' =>'admin' ], function() {

  Route::prefix('admin')->group(function () {

    // Rutas Proyectos
    Route::get('/', 'HomeController@indexAdmin');
    Route::get('/proyectos', 'ProjectsController@listProjects');
    Route::get('/proyectos_año', 'ProjectsController@listProjectsByYear');
    Route::get('/proyectos_cliente', 'ProjectsController@listProjectsByClient');
    Route::get('/proyectos_titulo', 'ProjectsController@listProjectsByTitle');
    Route::get('/proyecto_nuevo', 'ProjectsController@createProject');
    Route::post('/proyecto_nuevo', 'ProjectsController@storeProject');
    Route::get('/proyecto_modificar/{id}', 'ProjectsController@editProject');
    Route::patch('proyecto_modificar/{id}', 'ProjectsController@updateProject');
    Route::get('/proyecto_eliminar/{id}', 'ProjectsController@destroyProject');
    Route::get('/buscarProyectos', 'ProjectsController@searchProjects');

    // Rutas Tags
    Route::get('/etiquetas', 'TagsController@listTags');
    Route::get('/etiqueta_nueva', 'TagsController@createTag');
    Route::post('/etiqueta_nueva', 'TagsController@storeTag');
    Route::get('/etiqueta_modificar/{name}', 'TagsController@editTag');
    Route::patch('/etiqueta_modificar/{name}', 'TagsController@updateTag');
    Route::get('/eliminarEtiqueta/{name}', 'TagsController@destroyTag');

    // rutas user
    Route::get('/editar_cuenta/{id}', 'UsersController@profileEdit');
    Route::patch('/editar_cuenta/{id}', 'UsersController@update');

    // Rutas Products
    Route::get('/productos', 'ProductsController@listProducts');
    Route::get('/producto_nuevo', 'ProductsController@createProduct');
    Route::post('/producto_nuevo', 'ProductsController@storeProduct');
    Route::get('/producto_modificar/{name}', 'ProductsController@editProduct');
    Route::patch('/producto_modificar/{name}', 'ProductsController@updateProduct');
    Route::get('/eliminarProducto/{name}', 'ProductsController@destroyProduct');
  });
});

// cambiar idioma
Route::get('/{lang}', 'HomeController@changeLang');
