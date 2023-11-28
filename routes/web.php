<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardUserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/',[ClientController::class,'login']);
Route::post('/loginClient',[ClientController::class,'authenticate']);
Route::get('/dashboardClient',[DashboardUserController::class,'index']);
// Route::get('/role', function () {
//     return view('role');
// });

Route::get('/inscription',[ClientController::class,'create']);
Route::post('/inscriptionClient',[ClientController::class,'store']);

Route::get('/inscriptionAssociation', function () {
    return view('association.registerAssociation');
});
