<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/nomimatch', [App\Http\Controllers\RecruitmentController::class, 'index'])
    ->name('nomimatch.index');

    Route::get('/nomimatch/{recruitment}/show', [App\Http\Controllers\RecruitmentController::class, 'show'])
    ->name('nomimatch.detal')
    ->where('post', '[0-9]+');

    Route::get('/nomimatch/create', [App\Http\Controllers\RecruitmentController::class, 'create'])
    ->name('nomimatch.create');

    Route::post('/nomimatch/store', [App\Http\Controllers\RecruitmentController::class, 'store'])
    ->name('nomimatch.store');

    Route::get('/nomimatch/{recruitment}/edit_rec', [App\Http\Controllers\RecruitmentController::class, 'edit'])
    ->name('nomimatch.rec_edit')
    ->where('post', '[0-9]+');

    Route::patch('/nomimatch/{recruitment}/update_rec', [App\Http\Controllers\RecruitmentController::class, 'update'])
    ->name('nomimatch.rec_update');

    Route::delete('/nomimatch/{recruitment}/delete', [App\Http\Controllers\RecruitmentController::class, 'delete'])
    ->name('nomimatch.rec_delete')
    ->where('post', '[0-9]+');

    Route::get('/nomimatch/{profile}/userinfo', [App\Http\Controllers\UserInfoController::class, 'edit'])
    ->name('nomimatch.userinfo')
    ->where('post', '[0-9]+');

    Route::get('/nomimatch/{profile}/user_detail', [App\Http\Controllers\UserInfoController::class, 'detail'])
    ->name('nomimatch.user_detail')
    ->where('post', '[0-9]+');

    Route::get('/nomimatch/{profile}/edit_status', [App\Http\Controllers\UserInfoController::class, 'toggle'])
    ->name('nomimatch.edit_status')
    ->where('post', '[0-9]+');

    Route::patch('/nomimatch/{profile}/update', [App\Http\Controllers\UserInfoController::class, 'update'])
    ->name('nomimatch.user_update')
    ->where('post', '[0-9]+');

    Route::post('/nomimatch/{recruitment}/comment', [App\Http\Controllers\CommentController::class, 'create'])
    ->name('nomimatch.create_comment')
    ->where('post', '[0-9]+');

    Route::get('/nomimatch/{comment}/edit_comment', [App\Http\Controllers\CommentController::class, 'edit'])
    ->name('nomimatch.com_edit')
    ->where('post', '[0-9]+');

    Route::patch('/nomimatch/{comment}/update_comment', [App\Http\Controllers\CommentController::class, 'update'])
    ->name('nomimatch.com_update')
    ->where('post', '[0-9]+');

    Route::delete('/nomimatch/{comment}/delete_comment', [App\Http\Controllers\CommentController::class, 'delete'])
    ->name('nomimatch.com_delete')
    ->where('post', '[0-9]+');

    Route::get('/nomimatch/{recruitment}/participate', [App\Http\Controllers\ParticipantController::class, 'participate'])
    ->name('nomimatch.participate')
    ->where('post', '[0-9]+');

    Route::get('/nomimatch/{participant}/cancel', [App\Http\Controllers\ParticipantController::class, 'cancel'])
    ->name('nomimatch.cancel')
    ->where('post', '[0-9]+');

    Route::post('/nomimatch/{user}/request', [App\Http\Controllers\DrinkRequestController::class, 'request'])
    ->name('nomimatch.request')
    ->where('post', '[0-9]+');

    Route::get('/nomimatch/request_send', [App\Http\Controllers\DrinkRequestController::class, 'send_index'])
    ->name('nomimatch.request_send')
    ->where('post', '[0-9]+');

    Route::get('/nomimatch/request_receive', [App\Http\Controllers\DrinkRequestController::class, 'receive_index'])
    ->name('nomimatch.request_receive')
    ->where('post', '[0-9]+');

    Route::post('/drink-requests/{drinkRequest}/handle', [App\Http\Controllers\DrinkRequestController::class,'handleRequest'])
    ->name('drink-requests.handle');

    Route::get('/nomimatch/announcement/unread-count', [App\Http\Controllers\AnnouncementController::class, 'unreadCount'])
    ->name('announcement.unreadCount');

    Route::get('/check-drink-request/{announcementId}', [App\Http\Controllers\AnnouncementController::class, 'checkDrinkRequest'])
    ->where('announcementId', '[0-9]+');

    Route::get('/update-all-read-status', [App\Http\Controllers\AnnouncementController::class, 'updateAllReadStatus'])
    ->name('announcement.markAllAsRead');

    Route::post('/update-read-status/{announcementId}', [App\Http\Controllers\AnnouncementController::class, 'updateReadStatus']);

    Route::get('/nomimatch/{announcement}/announcement_info', [App\Http\Controllers\AnnouncementController::class, 'show'])
    ->name('announcement.show_announcement');

    Route::get('/nomimatch/{announcement_admin}/admin_announcement_info', [App\Http\Controllers\Announcement_adminController::class, 'show'])
    ->name('announcement.show_admin_announcement');


    Route::prefix('announcement')->middleware('auth')->group(function(){

        Route::get('/', [App\Http\Controllers\AnnouncementController::class, 'index'])->name('announcement.index');
        Route::get('/{announcement}', [App\Http\Controllers\AnnouncementController::class, 'show'])->name('announcement.show');

    });

});


require __DIR__.'/auth.php';

