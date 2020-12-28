<?php

use App\Http\Controllers\CampoController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/contacto',function(){
    return Inertia\Inertia::render('VistaPrincipalComponent/Contacto');
});
Route::get('/',function(){
    return Inertia\Inertia::render('VistaPrincipalComponent/Inicio');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::resource("campos", CampoController::class);
Route::resource("usuarios", UserController::class);
