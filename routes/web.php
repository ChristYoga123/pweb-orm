<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController as AdminTransactionController;
use App\Http\Controllers\Admin\VenueController;
use App\Http\Controllers\User\AuthController as UserAuthController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\TransactionController;
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

Route::get('/', [HomeController::class, "index"]);
Route::middleware("auth")->group(function () {
    Route::get("/show/{venue}", [HomeController::class, "show"])->name("venue.show");
    Route::get("/show/{id}/api", [HomeController::class, "show_api"]);
    Route::post("/transaction/{venue}", [TransactionController::class, "store"])->name("transaction.store");
});
Route::get("/payment/success", [TransactionController::class, "midtransCallback"]);
Route::post("/payment/success", [TransactionController::class, "midtransCallback"]);
// oAuth
Route::get("login-google", [UserAuthController::class, "google"])->name("home.login.google.index");
Route::get("/auth/google/callback", [UserAuthController::class, "handleProviderCallback"]);
Route::post("logout", [UserAuthController::class, "logout"])->name("logout");

/* ADMIN */
// non-Auth
Route::prefix("admin")->name("admin.")->middleware('guest_admin')->group(function () {
    // Login
    Route::get("login", [AuthController::class, "index"])->name("login.index");
    Route::post("login", [AuthController::class, "login"])->name("login");
});

Route::prefix("admin")->name("admin.")->middleware('auth_admin')->group(function () {
    // Logout
    Route::post("logout", [AuthController::class, "logout"])->name("logout");
    // Dashboard
    Route::get("/", [DashboardController::class, "index"])->name("dashboard.index");
    // Venue
    Route::resource("venue", VenueController::class);
    // Transaction
    Route::get("transaction", [AdminTransactionController::class, "index"])->name("transaction.index");
});
/* ADMIN */