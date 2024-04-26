<?php

namespace App\Http\Controllers;

use App\Mail\IntiveUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class InviteController extends Controller
{
    function invite()
    {
        $validated = request()->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'senderName' => 'required',
        ]);
        Mail::to($validated['email'])->send(new IntiveUser($validated));

        return response()->json([
            'success' => true,
            'message' => 'Invitation successfully sent.'
        ]);
    }
}
