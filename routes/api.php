<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\OrdisController;
use App\Http\Controllers\ClientsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Default route before modif by cedrick
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {
    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::get('/dashboard', [AuthController::class, 'dashboard']);           
    Route::get('/ordis', [OrdisController::class, 'listOrdis']);
    Route::post('/ordis/addpc', [OrdisController::class, 'store']);
    Route::post('/ordis/delattr', [AttributionController::class, 'store']);
    Route::post('/clients', [ClientsController::class, 'searchClients']); 
    Route::post('/clients/addclient', [ClientsController::class, 'createClient']); 
});