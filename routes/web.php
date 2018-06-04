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
Route::get('/admin', 'HomeController@indexAdmin')->middleware('admin');
// Publico
Route::get('/', 'HomeController@index')->name('home');
Route::get('/estudio', 'HomeController@us');
Route::get('/contacto', 'HomeController@contactUs');
Route::get('/tienda', 'HomeController@store');

// Rutas Proyectos
Route::get('/proyectos', 'ProjectsController@listProjects')->middleware('admin');
Route::get('/proyectos_año', 'ProjectsController@listProjectsByYear')->middleware('admin');
Route::get('/proyectos_cliente', 'ProjectsController@listProjectsByClient')->middleware('admin');
Route::get('/proyectos_titulo', 'ProjectsController@listProjectsByTitle')->middleware('admin');
Route::get('/proyecto_nuevo', 'ProjectsController@createProject')->middleware('admin');
Route::post('/proyecto_nuevo', 'ProjectsController@storeProject')->middleware('admin');
Route::get('/proyecto_modificar/{id}', 'ProjectsController@editProject')->middleware('admin');
Route::patch('proyecto_modificar/{id}', 'ProjectsController@updateProject')->middleware('admin');
Route::get('/proyecto_eliminar/{id}', 'ProjectsController@destroyProject')->middleware('admin');
Route::get('/buscarProyectos', 'ProjectsController@searchProjects')->middleware('admin');

// rutas frente
Route::get('/proyecto/{id}', 'ProjectsController@projectDescription');
Route::get('/proyectos/{tag}', 'ProjectsController@listProjectsByTag');

// Rutas Tags
Route::get('/etiquetas', 'TagsController@listTags')->middleware('admin');
Route::get('/etiqueta_nueva', 'TagsController@createTag')->middleware('admin');
Route::post('/etiqueta_nueva', 'TagsController@storeTag')->middleware('admin');
Route::get('/etiqueta_modificar/{name}', 'TagsController@editTag')->middleware('admin');
Route::patch('/etiqueta_modificar/{name}', 'TagsController@updateTag')->middleware('admin');
Route::get('/eliminarEtiqueta/{name}', 'TagsController@destroyTag')->middleware('admin');

// rutas user
Route::get('/editar_cuenta/{id}', 'UsersController@profileEdit')->middleware('admin');
Route::patch('/editar_cuenta/{id}', 'UsersController@update')->middleware('admin');

// Rutas Products
Route::get('/productos', 'ProductsController@listProducts')->middleware('admin');
Route::get('/producto_nuevo', 'ProductsController@createProduct')->middleware('admin');
Route::post('/producto_nuevo', 'ProductsController@storeProduct')->middleware('admin');
Route::get('/producto_modificar/{name}', 'ProductsController@editProduct')->middleware('admin');
Route::patch('/producto_modificar/{name}', 'ProductsController@updateProduct')->middleware('admin');
Route::get('/eliminarProducto/{name}', 'ProductsController@destroyProduct')->middleware('admin');

// no se encuentra proyecto
Route::get('/error', 'ProjectsController@error404');
