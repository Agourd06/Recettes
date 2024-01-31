<?php

use App\Models\Recipe;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RecetteController;



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

Route::get('/', function () {
    return view('index');
})->name('home');


Route::get('/page-register', function () {
    return view('pageRegister');
})->name('page.register');

Route::get('/add-page', function () {
    return view('AddRecipe');
})->name('add.page');



Route::get('/recettePage', function () {
    $recipes = Recipe::all();
    return view('recettePage', ['recipes' => $recipes]);
})->name('recettePage');


Route::get('/UserRecipe', function () {
    $recipes = auth()->user()->userRecipes()->latest()->get();
    return view('UserRecipe', ['recipes' => $recipes]);
})->name('UserRecipe');








Route::post('/register', [UserController::class,'register']);
Route::post('/logout', [UserController::class,'logout']);
Route::post('/login', [UserController::class,'login']);


// Recipe creation 

route::post('/New-recipe' , [RecetteController::class , 'CreateRecipe']);
// Recipe edit


route::get('/editing/{recipe}' , [RecetteController::class , 'EditedRecipe']);
route::put('/editing/{recipe}' , [RecetteController::class , 'ConfirmeEdit']);


//delete recipe

route::delete('/deleting/{recipe}' , [RecetteController::class , 'DeletePost']);
