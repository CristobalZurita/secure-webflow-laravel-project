<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ServicesController;
use App\Http\Controllers\PromotionsController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\SpecialistsController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AppointmentController;

// Rutas públicas
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/nosotros', [AboutController::class, 'index'])->name('about');
Route::get('/especialistas', [SpecialistsController::class, 'index'])->name('specialists');
Route::get('/planes', [ServicesController::class, 'index'])->name('plans');
Route::get('/promociones', [PromotionsController::class, 'index'])->name('promotions');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/contacto', [ContactController::class, 'index'])->name('contact');
Route::get('/agenda-tu-hora', [BookingController::class, 'index'])->name('booking');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');

// Rutas de autenticación
Auth::routes();

// Rutas para la autenticación de doble factor (2FA)
Route::get('2fa', [LoginController::class, 'showTwoFactorForm'])->name('2fa.form');
Route::post('2fa', [LoginController::class, 'verifyTwoFactor'])->name('2fa.verify');

// Middleware de tasa de limitación para login
Route::post('login', [LoginController::class, 'login'])->middleware('throttle:10,1']);

// Rutas protegidas
Route::middleware(['auth', 'verified'])->group(function () {
    // Otras rutas protegidas
    Route::get('/agendar-cita', [AppointmentController::class, 'showAppointmentForm'])->name('appointment.form');
    Route::post('/agendar-cita', [AppointmentController::class, 'scheduleAppointment'])->name('appointment.schedule');
    Route::get('/available-slots', [AppointmentController::class, 'getAvailableSlots'])->name('appointment.slots');
});

// Ruta duplicada de inicio (eliminar la duplicada al final)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
