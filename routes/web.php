<?php

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SeriesController;

Route::get('/series', [SeriesController::class, 'listarSeries']);

Route::get('/series/criarSeries', [SeriesController::class, 'criarSeries']);

Route::post('/series/criarSeries', [SeriesController::class, 'salvarSeries']);

Route::delete('/series/{id}', [SeriesController::class, 'removerSeries']);
