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

// Rutas de autenticación
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->middleware('throttle:10,1');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [AuthController::class, 'sendResetLinkEmail'])->name('password.email');
Route::post('/messages', [MessageController::class, 'store']);
Route::post('/appointments', [AppointmentController::class, 'store']);

// Rutas para la autenticación de doble factor (2FA)
Route::middleware(['auth'])->group(function () {
    Route::get('/verify', [AuthController::class, 'showVerifyForm'])->name('verify.index');
    Route::post('/verify', [AuthController::class, 'verifyTwoFactor'])->name('verify.store');
});

// Rutas protegidas
Route::middleware(['auth', 'verified', '2fa'])->group(function () {
    // Rutas que requieren autenticación, verificación de correo y 2FA
    Route::get('/agendar-cita', [AppointmentController::class, 'showAppointmentForm'])->name('appointment.form');
    Route::post('/agendar-cita', [AppointmentController::class, 'scheduleAppointment'])->name('appointment.schedule');
    Route::get('/available-slots', [AppointmentController::class, 'getAvailableSlots'])->name('appointment.slots');
    
    // Aquí puedes añadir más rutas protegidas según sea necesario
});

// Rutas de restablecimiento de contraseña
Route::get('/reset-password', [AuthController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [AuthController::class, 'resetPassword'])->name('password.update');

// Ruta de verificación de email
Route::get('/email/verify', [AuthController::class, 'showVerificationNotice'])->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [AuthController::class, 'verifyEmail'])->name('verification.verify');
Route::post('/email/resend', [AuthController::class, 'resendVerificationEmail'])->name('verification.resend');