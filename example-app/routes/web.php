<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\crudController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('/crud', crudController::class);

?>
