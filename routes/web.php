<?php

use App\Http\Controllers\ApartmentController;
use App\Http\Controllers\CityController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\JsonController;

Route::get('/info', function () {
    return phpinfo();
});

Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('/property/create', [PropertyController::class, 'create'])->name('property.create');
Route::post('/property/type', [PropertyController::class, 'redirector'])->name('property.redirector');
Route::post('/property', [PropertyController::class, 'store'])->name('property.store');

Route::get('/city', [CityController::class, 'index'])->name('city.index');
Route::get('/city/create', [CityController::class, 'create'])->name('city.create');
Route::post('/city/store', [CityController::class, 'store'])->name('city.store');
Route::delete('/city/delete/{id}', [CityController::class, 'destroy'])->name('city.destroy');

Route::resource('house', HouseController::class);

Route::resource('apartment', ApartmentController::class);

Route::get('/images/edit/{property_id}',[ImageController::class,'edit'])->name('images.edit');
Route::delete('/images/delete/{imageId}', [ImageController::class, 'destroy'])->name('image.delete');

Route::get('/json', [JsonController::class, 'index'])->name('json');
