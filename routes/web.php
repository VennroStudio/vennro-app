<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Profile\DialogController;
use App\Http\Controllers\Profile\MessageController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\Profile\NotificationController;
use App\Http\Controllers\Profile\LikeController;
use App\Http\Controllers\Profile\NewsController;
use App\Http\Controllers\Profile\PostController;
use App\Http\Controllers\Profile\ProfileController;
use App\Http\Controllers\Profile\SubscriptionController;
use App\Http\Controllers\Profile\UserActivityController;
use Illuminate\Support\Facades\Route;

//Авторизация
Route::get('/registration', [RegisterController::class, 'create'])->middleware('guest')->name('register');
Route::post('/registration', [RegisterController::class, 'store'])->middleware('guest');

Route::get('/login', [LoginController::class, 'create'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'store'])->middleware('guest');

Route::post('/logout', [LoginController::class, 'destroy'])->middleware('auth')->name('logout');


Route::get('/dialogs', [DialogController::class, 'allIndex'])->name('dialogs');
Route::post('/dialog/open', [DialogController::class, 'open'])->name('dialog.open');
Route::get('/dialog', [DialogController::class, 'oneIndex'])->name('dialog');
Route::delete('/dialog/{dialogId}', [DialogController::class, 'delete'])->name('dialog.delete');

Route::get('/profile/id{userId}', [ProfileController::class, 'show'])->middleware('auth')->name('profile.show');
Route::get('/profile/news', [NewsController::class, 'show'])->middleware('auth')->name('news.show');

Route::get('/notifications', [NotificationController::class, 'index'])->middleware('auth')->name('notifications');



Route::middleware('auth')->post('/user/activity/online', [UserActivityController::class, 'online']);
Route::middleware('auth')->post('/user/activity/offline', [UserActivityController::class, 'offline']);

Route::middleware('auth')->post('/profile/use/subscribe', [SubscriptionController::class, 'subscribe'])->name('subscribe');
Route::middleware('auth')->delete('/profile/use/unsubscribe', [SubscriptionController::class, 'unsubscribe'])->name('unsubscribe');



Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');


Route::post('/contact/form', [FormController::class, 'submit'])->name('contact-form');




Route::get('/page/restored/{page}', [PageController::class, 'restored'])->name('page.restored');

Route::get('/pages', [PageController::class, 'allPages'])->name('page.pages');

Route::get('/page/created', [PageController::class, 'created'])->name('page.created');

Route::get('/page/musor', [PageController::class, 'musor'])->name('page.musor');

Route::get('/page/{page}', [PageController::class, 'show'])->name('page.show');

Route::post('/pages/add', [PageController::class, 'addPage'])->name('page.addPage');

Route::get('/page/edit/{page}', [PageController::class, 'edit'])->name('page.edit');

Route::patch('/page/{page}', [PageController::class, 'updated'])->name('page.updated');

Route::delete('/page/{page}', [PageController::class, 'deleted'])->name('page.deleted');


