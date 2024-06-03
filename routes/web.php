<?php

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


Route::get('ventas/reportes_dia','ReporteController@reportes_dia')->name('reportes.dia');
Route::get('ventas/reportes_fecha','ReporteController@reportes_fecha')->name('reportes.fecha');


Route::post('ventas/reporte_resultados','ReporteController@reporte_resultados')->name('reporte.resultados');


Route::resource('categorias','CategoriaController')->names('categorias');
Route::resource('clientes','ClienteController')->names('clientes');
Route::resource('compras','CompraController')->names('compras');
Route::resource('productos','ProductoController')->names('productos');
Route::resource('proveedors','ProveedorController')->names('proveedors');
Route::resource('ventas','VentaController')->names('ventas');

Route::get('compras/pdf/{compra}','CompraController@pdf')->name('compras.pdf');
Route::get('ventas/pdf/{venta}','VentaController@pdf')->name('ventas.pdf');


Route::get('compras/upload/{compra}','CompraController@print')->name('upload.compras');
Route::get('cambiar_estado/productos/{producto}','ProductoController@cambiar_estado')->name('cambiar.estado.productos');
Route::get('cambiar_estado/compras/{compra}','CompraController@cambiar_estado')->name('cambiar.estado.compras');
Route::get('cambiar_estado/ventas/{venta}','VentaController@cambiar_estado')->name('cambiar.estado.ventas');

Route::resource('business','BusinessController')->names('business')->only(['index', 'update']);



Route::resource('users','UserController')->names('users');
Route::resource('roles','RoleController')->names('roles');



Route::get('/prueba', function () {
    return view('prueba');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('prediccions','PrediccionController')->names('prediccions');
Route::get('/graficos/prediccions', 'PrediccionsController@graficos')->name('prediccions.graficos');
