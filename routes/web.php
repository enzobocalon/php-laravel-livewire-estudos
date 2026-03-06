<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'as' => 'auth.',
    'name' => 'auth.',
    'middleware' => 'guest',
], function () {
    // Route::get('/login', [AuthController::class, 'index'])->name('login');
    // Route::get('/signup', [AuthController::class, 'signup'])->name('signup');

    Route::livewire('/login', 'auth.login')->name('login');
    Route::livewire('/signup', 'auth.signup')->name('signup');
});

Route::group([
    'as' => 'home.',
    'name' => 'home.',
    'middleware' => 'auth',
], function () {
    Route::livewire('/', 'home.index')->name('index');
    Route::livewire('/posts/{slug}', 'home.detail')->name('detail');
});

Route::group([
    'as' => 'admin.',
    'name' => 'admin.',
    'middleware' => ['admin']
], function () {
    Route::livewire('/admin/dashboard', 'admin.dashboard.index')->name('dashboard.index');
    Route::livewire('/admin/users', 'admin.dashboard.users')->name('dashboard.users');
    Route::livewire('/admin/user/{id}', 'admin.dashboard.user')->name('dashboard.user');
});
