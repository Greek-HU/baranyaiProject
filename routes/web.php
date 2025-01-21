<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

Route::controller(ProjectController::class)->group(function () {
    Route::get('/', 'public')->name('public');
    Route::post('/projects', 'saveProject')->name('store');
    Route::post('/updateComment/{c_id}/{p_id}', 'saveComment')->name('/updateComment/{id}/{p_id}');
    Route::get('/comment{id}', 'comment')->name('comment{id}');
    Route::get('summaryPage', 'summery')->name('summeryPage');

});
