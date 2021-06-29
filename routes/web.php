<?php

use Illuminate\Support\Facades\Auth;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/about', function () {
    return view('about');
});
Route::get('/contact', function () {
    return view('contact');
});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home/{id}', 'HomeController@show');

Route::get('/admin', 'AdminController@index');


/*oute::get('/servicios', 'ServicioController@index');
Route::get('/servicios/create', 'ServicioController@create'); //retorna vista crear donde esta el formulario
Route::get('/servicios/{id_servicio}', 'ServicioController@show');//ingresa id_servicio para buscar
Route::post('/servicios', 'ServicioController@store');//es el tipo de peticion post laravel llama el metodo store
Route::get('/servicios/{id_servicio}/edit', 'ServicioController@edit');//ingresa el id_servicio al metodo edit y crea una vista
Route::patch('/servicios/{id_servicio}', 'ServicioController@update');
Route::delete('/servicios/{id_servicio}', 'ServicioController@destroy');*/

Route::resource('servicios','ServiciosController');
Route::resource('medicamentos','MedicamentoController');
Route::resource('insumos','InsumosController');
Route::resource('instrumentos','InstrumentosController');
Route::resource('turnos','TurnosController');
Route::resource('especialidads','EspecialidadController');
//
Route::resource('users','UsersController');//->middleware('role:Admin,enfermera,paciente,manager');
Route::resource('roles','RolesController');//->middleware('can:isAdmin');

Route::resource('enfermeras','EnfermeraController');
Route::resource('compras','ComprasController');
