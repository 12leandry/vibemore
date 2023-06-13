<?php

use App\Http\Livewire\CreateGroup;
use App\Http\Livewire\Group;
use App\Http\Livewire\Groups;
use App\Http\Livewire\VideoPosts;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Home;
use App\Http\Livewire\Peoples;
use App\Http\Livewire\Search;
use App\Http\Livewire\Setting\AccountInfomation;
use App\Http\Livewire\Setting\Notifications;
use App\Http\Livewire\Setting\PasswordUpdate;
use App\Http\Livewire\Setting\Setting;
use App\Http\Livewire\Setting\Help;
use App\Http\Livewire\SinglePost;
use App\Http\Livewire\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(["auth", "verified", 'VerifiedUser'])->group(function () {
    Route::get('/', Home::class);
    Route::get('/post/{useruuid}/{postuuid}', SinglePost::class)->name('single-post');
    Route::get('/videos', VideoPosts::class)->name("videos");
    Route::get('/search', Search::class)->name("search");
    // Route::get('/profile', Profile::class)->name("profile");
    Route::get('/user/{uuid}', User::class)->name("user");
    

    Route::get('/groups', Groups::class)->name("groups");
    Route::get('/groups/{uuid}', Group::class)->name("group");
    Route::get('/group/create', CreateGroup::class)->name("create-group");


    // User settings
    Route::prefix('user-profile')->group(function () {
        Route::get('/', Setting::class)->name("setting");
        Route::get('/setting', AccountInfomation::class)->name("setting.account_information");
        Route::get('/reset-password', PasswordUpdate::class)->name("setting.password_update");
        Route::get('/notification', Notifications::class)->name("setting.notifications");
        Route::get('/help', Help::class)->name("setting.help");
    });

    Route::get('/explore', Peoples::class)->name("explore");

});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
