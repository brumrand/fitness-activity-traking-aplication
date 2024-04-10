<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ActivityDetailsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get("activites", [ActivityDetailsController::class, "getActivitiesDetails"]);
Route::get("activites/byType", [ActivityDetailsController::class, "getActivitiesDetailsByActivityType"]);
Route::get("activites/byType/distance", [ActivityDetailsController::class, "getDistanceByActivityType"]);
Route::get("activites/byType/elapsedTime", [ActivityDetailsController::class, "getElapsedTimeByActivityType"]);

Route::post("activity", [ActivityDetailsController::class, "post"]);
Route::delete("activity", [ActivityDetailsController::class, "delete"]);

