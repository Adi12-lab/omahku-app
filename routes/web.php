<?php


use App\Events\MessageDelivered;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Frontend\PropertyController;
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

Route::get('/', [\App\Http\Controllers\Frontend\IndexController::class, "index"])->name("home");
Route::controller(PropertyController::class)->group(function() {
    Route::get("/properti", "index")->name("frontend.property.index");
    Route::post("properti", "index");
});
Route::get("properti/{property:slug}", \App\Livewire\Frontend\Property\Detail::class)->name("frontend.property.view");
// Route::get("/properti", \App\Livewire\Frontend\Property\Index::class)->name("frontend.property.index");
ROute::controller(\App\Http\Controllers\Frontend\AgentController::class)->group(function() {
    Route::get("agen", "index")->name("frontend.agent");
    Route::get("agen/{agent_id}", "view")->name("frontend.agent.view");
    Route::post("agentMessage", "message");
});



Route::middleware('auth')->group(function () {
    Route::get("/profile", [ProfileController::class, "viewInFrontend"])->name("frontend.profile");
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get("/favorit", \App\Livewire\Frontend\Wishlist\Index::class)->name("wishlist");
});

Route::prefix("manage")->middleware(["auth", "isAdminOrAgent"])->group(function() {
    Route::get("/", function() {
        return view("admin.dasboard");
    })->name("dashboard.admin");
    Route::get("messages", \App\Livewire\Admin\Message\Index::class)->name("messages");
    
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
    Route::get("floors/{property:slug}", \App\Livewire\Admin\PropertyFLoor\Index::class)->name("property.floor");
});


require __DIR__.'/auth.php';
