<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\ScheduleController;
use App\Models\Reminder;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/helper', function () {
    return view('dashboard.helper');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/login', [SessionController::class, 'showLogin'])->name('login');
    Route::post('/login', [SessionController::class, 'login']);
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        $reminders = Reminder::where('user_id', auth()->id())->get();
        return view('dashboard.dashboard', compact('reminders'));
    })->name('dashboard');

    Route::post('/logout', [App\Http\Controllers\SessionController::class, 'logout'])->name('logout');

    Route::get('/create', [ReminderController::class, 'index'])->name('create');
    Route::post('/create/create', [ReminderController::class, 'store']);
    Route::post('/delete/{reminder}', [ReminderController::class, 'delete'])->name('delete');
    Route::get('/edit/{reminder}', [ReminderController::class, 'edit'])->name('edit');
    Route::post('/edit/{reminder}', [ReminderController::class, 'update'])->name('update');
    Route::patch('/dashboard/{reminder}/markAsDone', [ReminderController::class, 'markAsDone'])->name('markAsDone');
});