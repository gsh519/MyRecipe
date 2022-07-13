<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RecipeIndexController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// トップ
Route::get('/', [HomeController::class, 'init'])->name('home');

// レシピ一覧
Route::get('/recipe', [RecipeIndexController::class, 'init'])->name('recipe');

// レシピ登録
Route::get('/recipe/add',)->name('recipe.add');
Route::post('/recipe/add',);

// レシピ編集
Route::get('/recipe/edit/{recipe}',)->name('recipe.edit');
Route::post('/recipe/edit/{recipe}',);
