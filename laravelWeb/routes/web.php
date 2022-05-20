<?php

use App\Http\Controllers\webController;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('usuario.loginUsuario');
});
Auth::routes();

Route::group(['middleware' => ['auth', 'verified']], function(){ //comprueba si el usuario es admin o no es
    
    Route::get('home', [App\Http\Controllers\webController::class, 'index'])->name('home');
    Route::resource('usuario', webController::class)->middleware('role:role_id'); //sirve para usarlo en {{route(usuario.vistaquequeremosutilizar)}}
    Route::get('/crear_user', [App\Http\Controllers\webController::class, 'crear_user'])->name('crear_user')->middleware('role:role_id'); //el middleware hace que solo los admins puedan crear usuarios
    Route::get('/logout', [App\Http\Controllers\webController::class, 'logout'])->name('logout');

    Route::post('/list_usuarios', [App\Http\Controllers\webController::class, 'list_usuarios'])->name('list_usuarios'); //javascript tablejs
    Route::post('/list_usuarios_normales', [App\Http\Controllers\webController::class, 'list_usuarios_normales'])->name('list_usuarios_normales'); //javascript tablejs userview
    Route::get('/delete_user/{id}', [App\Http\Controllers\webController::class, 'delete_user'])->name('delete_user')->middleware('role:role_id');
    Route::get('/get_user/{id}', [App\Http\Controllers\webController::class, 'get_user'])->name('get_user');
    Route::post('/edit_usuario', [App\Http\Controllers\webController::class, 'edit_usuario'])->name('edit_usuario')->middleware('role:role_id');

    Route::resource('producto', Producto::class)->middleware('role:role_id'); //sirve para usarlo en {{route(usuario.vistaquequeremosutilizar)}}
    Route::get('/index_producto', [App\Http\Controllers\ProductController::class, 'index_producto'])->name('index_producto');
    Route::get('/view_producto', [App\Http\Controllers\ProductController::class, 'view_producto'])->name('view_producto');
    Route::get('/crear_producto', [App\Http\Controllers\ProductController::class, 'crear_producto'])->name('crear_producto')->middleware('role:role_id');
    Route::get('/delete_producto/{id}', [App\Http\Controllers\ProductController::class, 'delete_producto'])->name('delete_producto')->middleware('role:role_id');
    Route::get('/get_producto/{id}', [App\Http\Controllers\ProductController::class, 'get_producto'])->name('get_producto');

    Route::post('/edit_product', [App\Http\Controllers\ProductController::class, 'edit_product'])->name('edit_product')->middleware('role:role_id');
    Route::post('/new_product', [App\Http\Controllers\ProductController::class, 'new_product'])->name('new_product')->middleware('role:role_id');
    Route::post('/list_productos', [App\Http\Controllers\ProductController::class, 'list_productos'])->name('list_productos'); //javascript tablejs

    Route::get('/buy_product/{id}', [App\Http\Controllers\CarritoController::class, 'buy_product'])->name('buy_product');
    Route::get('/delete_carrito/{id}', [App\Http\Controllers\CarritoController::class, 'delete_carrito'])->name('delete_carrito');
    Route::get('/comprar_orden', [App\Http\Controllers\CarritoController::class, 'index'])->name('comprar_orden');
    Route::get('/minus_prod/{id}', [App\Http\Controllers\CarritoController::class, 'minus_prod'])->name('minus_prod');

    Route::post('/add_prod/{id}', [App\Http\Controllers\CarritoController::class, 'add_prod'])->name('add_prod'); 

    Route::get('/mandar_mail', [App\Http\Controllers\EmailController::class, 'mandar_mail'])->name('mandar_mail');
});

