<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [TeerController::class, 'homepage'])->name('home');
Route::get('/game/{game}', [TeerController::class, 'gameResults'])->name('game.results');
Route::get('/premium', [TeerController::class, 'premium'])->name('premium');
Route::get('/support', [TeerController::class, 'support'])->name('support');
Route::post('/contact', [TeerController::class, 'contactSubmit'])->name('contact.submit');
Route::get('/download', [TeerController::class, 'download'])->name('download');
Route::get('/terms', [TeerController::class, 'terms'])->name('terms');
Route::get('/privacy', [TeerController::class, 'privacy'])->name('privacy');

// Popup tracking (AJAX)
Route::post('/popup/impression', [TeerController::class, 'trackPopupImpression'])->name('popup.impression');
Route::post('/popup/click', [TeerController::class, 'trackPopupClick'])->name('popup.click');

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

// Admin Auth Routes (no middleware)
Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminController::class, 'showLogin'])->name('admin.login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

// Protected Admin Routes
Route::prefix('admin')->middleware('admin')->group(function () {
    // Dashboard
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard.alt');

    // Testimonials
    Route::get('/testimonials', [AdminController::class, 'testimonials'])->name('admin.testimonials');
    Route::get('/testimonials/create', [AdminController::class, 'createTestimonial'])->name('admin.testimonials.create');
    Route::post('/testimonials', [AdminController::class, 'storeTestimonial'])->name('admin.testimonials.store');
    Route::get('/testimonials/{id}/edit', [AdminController::class, 'editTestimonial'])->name('admin.testimonials.edit');
    Route::put('/testimonials/{id}', [AdminController::class, 'updateTestimonial'])->name('admin.testimonials.update');
    Route::delete('/testimonials/{id}', [AdminController::class, 'deleteTestimonial'])->name('admin.testimonials.delete');
    Route::post('/testimonials/{id}/toggle', [AdminController::class, 'toggleTestimonial'])->name('admin.testimonials.toggle');

    // Links
    Route::get('/links', [AdminController::class, 'links'])->name('admin.links');
    Route::put('/links', [AdminController::class, 'updateLinks'])->name('admin.links.update');

    // Banners
    Route::get('/banners', [AdminController::class, 'banners'])->name('admin.banners');
    Route::get('/banners/create', [AdminController::class, 'createBanner'])->name('admin.banners.create');
    Route::post('/banners', [AdminController::class, 'storeBanner'])->name('admin.banners.store');
    Route::get('/banners/{id}/edit', [AdminController::class, 'editBanner'])->name('admin.banners.edit');
    Route::put('/banners/{id}', [AdminController::class, 'updateBanner'])->name('admin.banners.update');
    Route::delete('/banners/{id}', [AdminController::class, 'deleteBanner'])->name('admin.banners.delete');
    Route::post('/banners/{id}/toggle', [AdminController::class, 'toggleBanner'])->name('admin.banners.toggle');

    // Popups
    Route::get('/popups', [AdminController::class, 'popups'])->name('admin.popups');
    Route::get('/popups/create', [AdminController::class, 'createPopup'])->name('admin.popups.create');
    Route::post('/popups', [AdminController::class, 'storePopup'])->name('admin.popups.store');
    Route::get('/popups/{id}/edit', [AdminController::class, 'editPopup'])->name('admin.popups.edit');
    Route::put('/popups/{id}', [AdminController::class, 'updatePopup'])->name('admin.popups.update');
    Route::delete('/popups/{id}', [AdminController::class, 'deletePopup'])->name('admin.popups.delete');
    Route::post('/popups/{id}/toggle', [AdminController::class, 'togglePopup'])->name('admin.popups.toggle');
    Route::post('/popups/{id}/reset-stats', [AdminController::class, 'resetPopupStats'])->name('admin.popups.reset');

    // Contact Submissions
    Route::get('/submissions', [AdminController::class, 'submissions'])->name('admin.submissions');
    Route::get('/submissions/{id}', [AdminController::class, 'viewSubmission'])->name('admin.submissions.view');
    Route::post('/submissions/{id}/read', [AdminController::class, 'markAsRead'])->name('admin.submissions.read');
    Route::post('/submissions/{id}/reply', [AdminController::class, 'replySubmission'])->name('admin.submissions.reply');
    Route::delete('/submissions/{id}', [AdminController::class, 'deleteSubmission'])->name('admin.submissions.delete');

    // Settings
    Route::get('/settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::put('/settings', [AdminController::class, 'updateSettings'])->name('admin.settings.update');
    Route::post('/settings/password', [AdminController::class, 'changePassword'])->name('admin.settings.password');
});

/*
|--------------------------------------------------------------------------
| Error Pages
|--------------------------------------------------------------------------
*/

Route::fallback(function () {
    return response()->view('errors.404', [], 404);
});
