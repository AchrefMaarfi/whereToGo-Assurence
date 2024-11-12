<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AssuranceController;

/*
|----------------------------------------------------------------------
| API Routes
|----------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Define routes for Assurance CRUD operations
Route::apiResource('assurances', AssuranceController::class);

// You can also add custom routes if needed (e.g., filtering, price range, etc.)
// Example: Retrieve assurances within a price range
Route::get('assurances/price-range', [AssuranceController::class, 'priceRange']);

// Example: Get detailed info for a specific assurance
Route::get('assurances/{id}/details', [AssuranceController::class, 'details']);

// Optional: Route for testing authenticated user (if using Sanctum or similar)
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
