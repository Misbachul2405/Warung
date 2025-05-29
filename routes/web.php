<?php

use Illuminate\Support\Facades\Route;

//route home
Route::get('/', function () {
    return \Inertia\Inertia::render('Auth/Login');
})->middleware('guest');

//prefix "apps"
Route::prefix('apps')->group(function() {

    //middleware "auth"
    Route::group(['middleware' => ['auth']], function () {

        //route dashboard
        Route::get('dashboard', App\Http\Controllers\Apps\DashboardController::class)->name('apps.dashboard');

        //route permissions
        Route::get('/permissions', [\App\Http\Controllers\Apps\PermissionController::class, 'index'])->name('apps.permissions.index');

        //route resource roles
        Route::resource('/roles', \App\Http\Controllers\Apps\RoleController::class, ['as' => 'apps']);

        //route resource users
        Route::resource('/users', \App\Http\Controllers\Apps\UserController::class, ['as' => 'apps']);

        //route resource categories
        Route::resource('/categories', \App\Http\Controllers\Apps\CategoryController::class, ['as' => 'apps']);

        //route resource products
        Route::resource('/products', \App\Http\Controllers\Apps\ProductController::class, ['as' => 'apps']);

        //route resource customers
        Route::resource('/customers', \App\Http\Controllers\Apps\CustomerController::class, ['as' => 'apps']);

        //route transaction
        Route::get('/transactions', [\App\Http\Controllers\Apps\TransactionController::class, 'index'])->name('apps.transactions.index');

        //route transaction searchProduct
        Route::post('/transactions/searchProduct', [\App\Http\Controllers\Apps\TransactionController::class, 'searchProduct'])->name('apps.transactions.searchProduct');

        //route transaction addToCart
        Route::post('/transactions/addToCart', [\App\Http\Controllers\Apps\TransactionController::class, 'addToCart'])->name('apps.transactions.addToCart');

        //route transaction destroyCart
        Route::post('/transactions/destroyCart', [\App\Http\Controllers\Apps\TransactionController::class, 'destroyCart'])->name('apps.transactions.destroyCart');

        //route transaction store
        Route::post('/transactions/store', [\App\Http\Controllers\Apps\TransactionController::class, 'store'])->name('apps.transactions.store');

        //route transaction print
        Route::get('/transactions/print', [\App\Http\Controllers\Apps\TransactionController::class, 'print'])->name('apps.transactions.print');

    });
});
