<?php

use App\Http\Controllers\TagsCategory\TagsCategory;
use App\Http\Controllers\User\ArticleController;
use App\Http\Controllers\User\DashboardController;
use App\Http\Controllers\User\LoginController;
use App\Http\Middleware\UserMiddleware;
use Illuminate\Support\Facades\Route;


Route::get('user/login',[LoginController::class,'login']);
Route::post('user/do-login',[LoginController::class,'doLogin'])->name('do.login');
Route::middleware(UserMiddleware::class)->name('user.cookie')->group(function(){
        Route::name('dashboard.')->prefix('user/dashboard')->group(function(){
        Route::get('/',[ArticleController::class,'showArticle'])->name('dashboard');
        Route::get('/create-article',[ArticleController::class,'getArticleform'])->name('article');
        Route::post('/create-article/{id?}',[ArticleController::class,'postArticles'])->name('article');
        Route::get('/get-article/{id}',[ArticleController::class,'getArticle'])->name('showarticle');
        Route::get('/get-article/{id}',[ArticleController::class,'getArticle'])->name('showarticle');
        Route::get('/edit-article/{id}',[ArticleController::class,'editArticle'])->name('editarticle');
        Route::get('/delete-article/{id}',[ArticleController::class,'deleteArticle'])->name('editarticle');


        Route::get('/category',[TagsCategory::class,'getCategory'])->name('getcategory');
        Route::post('/create-category/{id?}',[TagsCategory::class,'postCategory'])->name('postcategory');
        Route::get('/get-categories',[TagsCategory::class,'showCategory'])->name('showcategory');

        Route::get('/tag',[TagsCategory::class,'getTag'])->name('gettag');
        Route::post('/create-tag/{id?}',[TagsCategory::class,'postTag'])->name('posttag');
        Route::get('/get-tags',[TagsCategory::class,'showTags'])->name('showtag');

        Route::get('/logout',[LoginController::class,'logOut'])->name('logout');


    });
});

// Route::name('dashboard.')->prefix('user')->group(function(){
//     Route::get('user/dashboard',[DashboardController::class,'dashBoard'])->name('dashboard');
// });
