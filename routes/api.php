use App\Http\Controllers\AuthController;

Route::post('login', [AuthController::class, 'login']);
Route::middleware('auth:sanctum')->post('logout', [AuthController::class, 'logout']);sudo chown -R cz:users /opt/lampp/htdocs/secure-laravel-project
