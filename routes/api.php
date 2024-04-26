<?php

use App\Http\Controllers\InviteController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;

Route::post('/inviteMember', [InviteController::class, 'invite']);
Route::post('/sendPushNotification', [NotificationController::class, 'send']);