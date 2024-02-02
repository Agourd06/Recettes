<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\RecetteController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\Recipe;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware([RedirectIfAuthenticated::class])->get('/', function () {
    return view('index');
})->name('home');

Route::get('/page-register', function () {
    return view('pageRegister');
})->name('page.register');

// Recipe creation
Route::get('/add-page', function () {
    if (Auth::check()) {
        return view('AddRecipe');
    } else {
        return redirect()->route('home');
    }
})->name('add.page');

route::post('/New-recipe', [RecetteController::class, 'CreateRecipe']);

// Recipe edit
route::get('/editing/{recipe}', [RecetteController::class, 'EditedRecipe']);
route::put('/editing/{recipe}', [RecetteController::class, 'ConfirmeEdit']);

// Delete recipe
route::delete('/deleting/{recipe}', [RecetteController::class, 'DeletePost']);

//show all recipes
Route::get('/recettePage', function () {
    $recipes = Recipe::latest()->get();
    
    return view('recettePage', ['recipes' => $recipes]);
})->name('recettePage');

//show user recipes
Route::get('/UserRecipe', function () {
    if (Auth::check()) {
        $recipes = auth()->user()->userRecipes()->latest()->get();
        return view('UserRecipe', ['recipes' => $recipes]);
    } else {
        return redirect()->route('home');
    }
})->name('UserRecipe');

//search

Route::get('/search', [RecetteController::class, 'search'])->name('search');

//authentification
Route::post('/register', [UserController::class, 'register']);
Route::post('/logout', [UserController::class, 'logout']);
Route::post('/login', [UserController::class, 'login']);
