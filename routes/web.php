<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ====Auth===============
Auth::routes(['verify' => true]);

// ========End of Auth=======


// ========Frontend==============
require __DIR__ . '/public.php';
// =======end of Frontend=========

// ===========Backend============
Route::group(['middleware' => ['auth.admin', 'verified']], function () {
    Route::prefix('admin')->group(function () {
        require __DIR__ . '/admin.php';
    });
});
// =======end of Backend====

// =====handle wrong url======
Route::redirect('/{any}', '/', 301);
//=======end of handling wrong url===
