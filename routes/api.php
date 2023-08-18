<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/** Start Controllers **/
    use App\Http\Controllers\ClientsController;
    use App\Http\Controllers\StatesController;
    use App\Http\Controllers\CitiesController;
/** End Controllers **/

Route::prefix('/clients')->group(function() {
    Route::get('/', [ClientsController::class, 'index']);
    Route::post('/create', [ClientsController::class, 'store']);
    Route::get('/getByID/{client}', [ClientsController::class, 'show']);
    Route::match(['PUT', 'PATCH'], '/update/{client}', [ClientsController::class, 'update']);
    Route::delete('/delete/{client}', [ClientsController::class, 'destroy']);
}); 

Route::prefix('/location')->group(function() {
    Route::get('/cities/{state}', [CitiesController::class, 'index']);
    Route::get('/state', [StatesController::class, 'index']);
}); 

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
