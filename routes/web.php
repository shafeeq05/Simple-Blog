<?php

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // return "hai";
    session()->flash('log','login');

    return view('Layout.welcome');
});

// Route::get('/images/{path}/{subpath}/{filename?}', function ($path, $subpath, $filename = null) {

// if ($filename == null) {
//     $path = $path . '/' . $subpath;
// } else {
//     $path = $path . '/' . $subpath . '/' . $filename;
// }
// Log::debug('image path');
// Log::debug($path);
// Log::debug(Storage::has($path));
// if (Storage::has($path)) {
//     return Image::make(storage_path('app/' . $path))->response();
// }
// abort(404);
// });
