<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/





Route::resource('vehiculos', 'VehiculoAPIController');

Route::resource('socursals', 'SocursalAPIController');

Route::resource('lavados', 'LavadoAPIController');