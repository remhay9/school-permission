<?php

Route::middleware(['auth'])->group(function () {
    Route::resource('users', UserController::class);
});
