<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/** Start Controllers **/
    use App\Http\Controllers\UsersController;
    use App\Http\Controllers\ClientsController;
/** End Controllers **/

Route::prefix('/clients')->group(function() {
    Route::get('/', [ClientsController::class, 'index']);
    Route::post('/create', [ClientsController::class, 'store']);
    Route::match(['PUT', 'PATCH'], '/update/{id}', [ClientsController::class, 'update']);
    Route::post('/delete/{id}', [ClientsController::class, 'destroy']);
}); 

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
