<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['web'])->prefix('countries')->group(function() {
    Route::get('/regions/{country}', [\Packages\Country\App\Http\Controllers\RegionsController::class, 'getByCountry'])->name('regions.get_by_country');
});
