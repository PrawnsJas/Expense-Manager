<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// Redirect root URL to Dashboard
Route::get('/', function () {
    return redirect('/dashboard'); // Redirect to Dashboard
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
});

Route::get('/user-management/roles', function () {
    return Inertia::render('Roles');
});

Route::get('/user-management/users', function () {
    return Inertia::render('Users');
});

Route::get('/expense-management/categories', function () {
    return Inertia::render('ExpenseCategories');
});

Route::get('/expense-management/expenses', function () {
    return Inertia::render('Expenses');
});
