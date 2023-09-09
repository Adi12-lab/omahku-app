<?php

use App\Http\Controllers\ProfileController;
use App\Models\Property;
use Illuminate\Support\Facades\App;
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
    return view('frontend.index');
})->name("home");


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix("manage")->middleware(["auth", "isAdminOrAgent"])->group(function() {
    Route::get("/", function() {
        return view("admin.dasboard");
    })->name("dashboard.admin");
    
    Route::middleware("isAdmin")->group(function() {
        Route::get("kategori", \App\Livewire\Admin\Category\Index::class)->name("category");
        Route::get("fasilitas", \App\Livewire\Admin\Feature\Index::class)->name("feature");
        Route::get("users", \App\Livewire\Admin\User\Index::class)->name("users");
        Route::get("agents", \App\Livewire\Admin\Agent\Index::class)->name("agents");
    });

    Route::controller(ProfileController::class)->group(function() {
        Route::get("/profile", "viewInAdmin")->name("profile");
        Route::patch("/profile/agent", "createOrUpdateAgent")->name("profile.agent.cu");
    });

    Route::resource("property", \App\Http\Controllers\Admin\PropertyController::class);
    Route::get("floors/{property}", function(Property $property) {
        $property_floors = $property->propertyFloors;
        return view("admin.property.property_floor", compact("property_floors", "property"));
    })->name("property.image");
});


require __DIR__.'/auth.php';
