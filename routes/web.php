<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\API\ContactApiController;
use Illuminate\Support\Facades\Route;

// Homepage route
Route::get('/', [HomeController::class, 'index'])->name('home');

// Contact form submission
Route::post('/contact/submit', [ContactController::class, 'store'])->name('contact.submit');

// Simple Admin Dashboard (NO AUTHENTICATION REQUIRED)
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        $totalContacts = \App\Models\Contact::count();
        $pendingContacts = \App\Models\Contact::where('status', 'pending')->count();
        $repliedContacts = \App\Models\Contact::where('status', 'replied')->count();
        
        return view('admin.dashboard', compact('totalContacts', 'pendingContacts', 'repliedContacts'));
    })->name('dashboard');
    
    // Contact management routes
    Route::resource('contacts', ContactAdminController::class);
});
Route::prefix('api')->group(function() {
    Route::apiResource('contacts', ContactApiController::class);
});

// Remove or comment out auth routes if you don't need them
// require __DIR__.'/auth.php';