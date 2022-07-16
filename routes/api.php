<?php

use App\Http\Controllers\Api\AlmocoController;
use App\Http\Controllers\Api\JantaController;
use App\Http\Controllers\Api\CafeManhaController;
use App\Http\Controllers\Api\CardapioController;
use App\Http\Controllers\Api\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(AlmocoController::class)->group(function (){

    Route::get('/almocos', 'index');
    Route::post('/almoco', 'store');
    Route::get('/almoco/{id}', 'show');
    Route::put('/almoco/{id}', 'update');
    Route::delete('/almoco/{id}', 'destroy');
    Route::get('/almoco/date/{date}', 'getAlmocoFromDate');

});

Route::controller(CafeManhaController::class)->group(function (){

    Route::get('/cafes', 'index');
    Route::post('/cafe', 'store');
    Route::get('/cafe/{id}', 'show');
    Route::put('/cafe/{id}', 'update');
    Route::delete('/cafe/{id}', 'destroy');
    Route::get('/cafe/date/{date}', 'getCafeManhaFromDate');

});

Route::controller(JantaController::class)->group(function (){

    Route::get('/jantas', 'index');
    Route::post('/janta', 'store');
    Route::get('/janta/{id}', 'show');
    Route::put('/janta/{id}', 'update');
    Route::delete('/janta/{id}', 'destroy');
    Route::get('/janta/date/{date}', 'getJantaFromDate');

});

Route::controller(CardapioController::class)->group(function (){

    Route::get('/cardapios', 'index');
    Route::post('/cardapio', 'store');
    Route::get('/cardapio/{id}', 'show');
    Route::put('/cardapio/{id}', 'update');
    Route::delete('/cardapio/{id}', 'destroy');
    Route::get('/cardapio/date/{date}', 'getCardapioFromDate');

});

Route::controller(UsuarioController::class)->group(function (){

    Route::post('/entrar', 'checkUser');
    
});
