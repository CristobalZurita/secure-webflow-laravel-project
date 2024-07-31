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

// Rutas públicas
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/nosotros', [AboutController::class, 'index'])->name('about');
Route::get('/especialistas', [SpecialistsController::class, 'index'])->name('specialists');
Route::get('/planes', [ServicesController::class, 'index'])->name('plans');
Route::get('/promociones', [PromotionsController::class, 'index'])->name('promotions');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('/contacto', [ContactController::class, 'index'])->name('contact');
Route::get('/agenda-tu-hora', [BookingController::class, 'index'])->name('booking');

// Rutas de autenticación
Auth::routes();

// Rutas para la autenticación de doble factor (2FA)
Route::get('2fa', [LoginController::class, 'showTwoFactorForm'])->name('2fa.form');
Route::post('2fa', [LoginController::class, 'verifyTwoFactor'])->name('2fa.verify');

// Rutas protegidas
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    // Otras rutas protegidas
});
