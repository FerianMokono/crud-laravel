<?php
use App\Http\Controllers\ChambreController;
use App\Http\Controllers\ControllerClient;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/client', [ControllerClient::class, 'index']);
Route::get('/ajouter', [ControllerClient::class, 'create']);
Route::post('/ajoute/trairement', [ControllerClient::class, 'store']);
Route::get('/update/{id}', [ControllerClient::class, 'update']);
Route::post('/update/trairement', [ControllerClient::class, 'traitement_update']);
Route::get('/delete/{id}', [ControllerClient::class, 'delete']);
Route::get('/show/{id}', [ControllerClient::class, 'show']);
Route::get('/search/traitement', [ControllerClient::class, 'search']);
Route::get('/affiche', [ControllerClient::class, 'pdfindex']);
Route::get('/imprimer', [ControllerClient::class, 'imprime']);
Route::get('/afficher/{id}', [ControllerClient::class, 'showclient']);
Route::get('/imprimer2', [ControllerClient::class, 'pdfshow']);

//

Route::get('/chambre', [ChambreController::class, 'index']);
Route::get('/ajouter-chambre', [ChambreController::class, 'create']);
Route::post('/chambre/traitemnet', [ChambreController::class, 'store'] );
Route::get('/update-chambre/{id}', [ChambreController::class, 'update']);
Route::post('/update-chambre/traitemnet', [ChambreController::class, 'update_store'] );
Route::get('/delete-chambre/{id}', [ChambreController::class, 'delete']);

//

Route::get('/reservation', [ReservationController::class, 'index']);
Route::get('/ajouter-reservation', [ReservationController::class, 'create']);
Route::post('/reservation/traitement', [ReservationController::class, 'store']);




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';