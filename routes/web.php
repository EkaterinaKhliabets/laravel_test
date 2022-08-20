<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('email.order');
});

// страницы, доступные для гостей
// вся система закрыта от гостей, гость может только залогиниться
Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginForm'])->name('loginForm');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');


});

// здесь роуты, доступные для админа
Route::group(['middleware' => 'admin'], function () {

    //администратор регистрирует новых пользователей системы
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'registerForm'])->name('registerForm');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register'])->name('register');

    // администратор может загрузить курсы валют с помощью сервиса с сайта nbrb.by
    Route::get('/rates_download', [\App\Http\Controllers\RateController::class, 'download'])
        ->name('rates.download');

    Route::get('/rates', [\App\Http\Controllers\RateController::class, 'index'])
        ->name('rates.index');

    Route::get('/rate', function (\App\Services\Rate\Interfaces\RateServiceContract $rateService) {

        dd($rateService->rate());
        /* //dd(\App\Facade\Weather::generalInformation()->getNameCity());
         //WeatherServiceContract $weatherService
         //return view('weather.index', ['weatherService' => $weatherService]);

         return view('weather.index');*/

    });

    // администратор может создать/изменить данные организации
    Route::get('/organization', [\App\Http\Controllers\OrganizationController::class, 'index'])
        ->name('organization.index');

    Route::put('/organization', [\App\Http\Controllers\OrganizationController::class, 'update'])
        ->name('organization.update');



});


// здесь только доступ для тех пользователей, которые прошли аутентификацию и авторизацию
Route::group(['middleware' => 'auth'], function () {
    Route::resource('clients', \App\Http\Controllers\ClientsController::class)->names([
        'edit' => 'clients.edit',
        'create' => 'clients.create',
        'show' => 'clients.show',
        'index' => 'clients.index',
        'store' => 'clients.store',
        'update' => 'clients.update',
        'destroy' => 'clients.delete'
    ]);

    Route::resource('contact_faces', \App\Http\Controllers\ContactFaceController::class)->names([
        'edit' => 'contact_faces.edit',
        'create' => 'contact_faces.create',
        'show' => 'contact_faces.show',
        'index' => 'contact_faces.index',
        'store' => 'contact_faces.store',
        'update' => 'contact_faces.update',
        'destroy' => 'contact_faces.delete'
    ]);

    Route::resource('orders', \App\Http\Controllers\OrderController::class)->names([
        'edit' => 'orders.edit',
        'create' => 'orders.create',
        'show' => 'orders.show',
        'index' => 'orders.index',
        'store' => 'orders.store',
        'update' => 'orders.update',
        'destroy' => 'orders.delete'
    ]);



    Route::get('/rate_find/{currency}/{date}', [\App\Http\Controllers\RateController::class, 'findRate'])
        ->name('rates.find');

    Route::get('/ecommerce', [\App\Http\Controllers\EcommerceController::class, 'index'])
        ->name('ecommerce.index');

    Route::get('/ecommerce/sales', [\App\Http\Controllers\EcommerceController::class, 'sales_month'])
        ->name('ecommerce.sales_month');

    Route::resource('bank_accounts', \App\Http\Controllers\BankAccountController::class )->names([
        'edit' => 'bankAccounts.edit',
        'create' => 'bankAccounts.create',
        'show' => 'bankAccounts.show',
        'index' => 'bankAccounts.index',
        'store' => 'bankAccounts.store',
        'update' => 'bankAccounts.update',
        'destroy' => 'bankAccounts.delete'
    ]);

    Route::resource('currencies', \App\Http\Controllers\CurrencyController::class )->names([
        'edit' => 'currencies.edit',
        'create' => 'currencies.create',
        'show' => 'currencies.show',
        'index' => 'currencies.index',
        'store' => 'currencies.store',
        'update' => 'currencies.update',
        'destroy' => 'currencies.delete'
    ]);

    Route::resource('products', \App\Http\Controllers\ProductController::class)->names([
        'edit' => 'products.edit',
        'create' => 'products.create',
        'show' => 'products.show',
        'index' => 'products.index',
        'store' => 'products.store',
        'update' => 'products.update',
        'destroy' => 'products.delete'
    ]);

    Route::resource('banks', \App\Http\Controllers\BankController::class)->names([
        'edit' => 'banks.edit',
        'create' => 'banks.create',
        'show' => 'banks.show',
        'index' => 'banks.index',
        'store' => 'banks.store',
        'update' => 'banks.update',
        'destroy' => 'banks.delete'
    ]);

    Route::resource('users', \App\Http\Controllers\UserController::class)->names([
        'edit' => 'users.edit',
        'create' => 'users.create',
        'show' => 'users.show',
        'index' => 'users.index',
        'store' => 'users.store',
        'update' => 'users.update',
        'destroy' => 'users.delete'
    ]);

    Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');

    Route::get('/invoice/{id}', [\App\Http\Controllers\InvoiceController::class, 'index'])->name('invoice.index');
});


//Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');

/*Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
Route::get('/users/{users}/edit', [\App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
Route::get('/users/{users}', [\App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');*/
