<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\ExpenseCategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout'); // Add a logout route


// Redirect to Dashboard
Route::get('/', function () {
    return redirect('/dashboard');
});

// Dashboard Route
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
});

// User Management Routes
Route::get('/user-management/roles', [RoleController::class, 'index'])->name('roles.index');
Route::get('/user-management/users', [UserController::class, 'index'])->name('users.index');

// Expense Management Routes
Route::get('/expense-management/categories', [ExpenseCategoryController::class, 'index'])->name('categories.index');
Route::get('/expense-management/expenses', [ExpenseController::class, 'index'])->name('expenses.index');

// Update user role
Route::put('/user-management/users/{id}', [UserController::class, 'update'])->name('users.update');
Route::post('/user-management/users', [UserController::class, 'store'])->name('users.store');

// Update role
Route::put('/user-management/roles/{id}', [RoleController::class, 'update'])->name('roles.update');
Route::post('/user-management/roles', [RoleController::class, 'store']);

// Update expense category
Route::post('/expense-management/categories', [ExpenseCategoryController::class, 'store'])->name('categories.store');
Route::put('/expense-management/categories/{id}', [ExpenseCategoryController::class, 'update'])->name('categories.update');

// Update expense
Route::put('/expense-management/expenses/{id}', [ExpenseController::class, 'update'])->name('expenses.update');
Route::post('/expense-management/expenses', [ExpenseController::class, 'store']);

// Delete user
Route::delete('/user-management/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

// Delete role
Route::delete('/user-management/roles/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');

// Delete expense category
Route::delete('/expense-management/categories/{id}', [ExpenseCategoryController::class, 'destroy'])->name('categories.destroy');

// Delete expense
Route::delete('/expense-management/expenses/{id}', [ExpenseController::class, 'destroy'])->name('expenses.destroy');
