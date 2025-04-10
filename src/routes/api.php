<?php

use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CountryController;
use App\Http\Controllers\Api\MicroregionController;
use App\Http\Controllers\Api\RegionController;
use Illuminate\Support\Facades\Route;

Route::get('/country', [CountryController::class,'index'])->name('api.country');
Route::get('/region/{country}', [RegionController::class,'index'])->name('api.region');
Route::get('/city/{region}', [CityController::class,'index'])->name('api.city');
Route::get('/microregion/{city}',[MicroregionController::class,'index'])->name('api.microregion');
