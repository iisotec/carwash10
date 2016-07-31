<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('home');
});

Route::auth();

Route::get('/home', 'HomeController@index');
# vehiculos, sera para poder acceder por la web que apuntara al controlador VehiculoController
/*Route::resource('vehiculo', 'VehiculoController');
*/


/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

/*Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});*/

/*Route::group(['middleware'=>'auth'], function(){
	Route::resource('vehiculos', 'VehiculoController');
	#socursales
	Route::resource('socursals', 'SocursalController');
	Route::post('atender_lavado', 'LavadoController@atender');
	#lavados
	Route::resource('lavados', 'LavadoController');
	Route::post('lavado', 'LavadoController@crear');
	#reportes
	Route::get('reportes', 'PdfController@index');
	Route::get('reportes/pdf', 'PdfController@reportes_basicos');
	Route::get('reportes/reporte_rango_fecha', 'PdfController@reporte_rango_fecha');
	Route::get('reportes/reporte_excel', 'ExcelController@reporteExcel');
	#usuarios
	Route::resource('users', 'UserController');

});*/


Route::group(['middleware'=>['auth', 'is_admin']], function(){

	Route::resource('vehiculos', 'VehiculoController');
	#socursales
	Route::resource('socursals', 'SocursalController');
	/*Route::post('atender_lavado', 'LavadoController@atender');*/
	#lavados
/*	Route::resource('lavados', 'LavadoController');*/
	Route::post('atender_lavado', 'LavadoController@atender');
	Route::resource('lavados', 'LavadoController');
	Route::post('lavado', 'LavadoController@crear');

	
	#reportes
	/*Route::get('reportes', 'PdfController@index');
	Route::get('reportes/pdf', 'PdfController@reportes_basicos');
	Route::get('reportes/reporte_rango_fecha', 'PdfController@reporte_rango_fecha');
	Route::get('reportes/reporte_excel', 'ExcelController@reporteExcel');*/
	#usuarios
	Route::resource('users', 'UserController');

});


Route::group(['middleware'=>['auth', 'is_cajero']], function(){
	Route::post('atender_lavado', 'LavadoController@atender');
	Route::resource('lavados', 'LavadoController');
	Route::post('lavado', 'LavadoController@crear');
	
	Route::get('reportes', 'PdfController@index');
	Route::get('reportes/pdf', 'PdfController@reportes_basicos');
	Route::get('reportes/reporte_rango_fecha', 'PdfController@reporte_rango_fecha');
	Route::get('reportes/reporte_excel', 'ExcelController@reporteExcel');
	

});
Route::group(['middleware' => ['auth','is_lavador']], function() {
	Route::resource('vehiculos', 'VehiculoController');
	/*Route::resource('lavados', 'LavadoController');
	Route::resource('vehiculos', 'VehiculoController');*/

/*Route::group(['middleware'=>['auth', 'is_lavador'], 'prefix'=>'vehiculos'], function(){

/*	Route::resource('vehiculos', 'VehiculoController');*/
	/*Route::resource('lavados', 'LavadoController');
	Route::post('lavado', 'LavadoController@crear');*/
	

});
