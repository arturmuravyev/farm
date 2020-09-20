<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AnimalController;
use App\Http\Controllers\Api\AnimalKindController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('animals/{name}',  [AnimalController::class, 'getByName']);

Route::post('animals/age',  [AnimalController::class, 'age']);

Route::post('animals', [AnimalController::class, 'store']);

Route::get('animal_kinds', [AnimalKindController::class, 'getAnimalKinds']);