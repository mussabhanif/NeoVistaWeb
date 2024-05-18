<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Kreait\Firebase\Messaging\CloudMessage;
// use Kreait\Laravel\Firebase\Facades\Firebase;
use Kreait\Firebase\Factory;
use Kreait\Firebase\Messaging\CloudMessage;

class NotificationController extends Controller
{
    public function send(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'body' => 'required',
            'image' => 'nullable|url',
            'url' => 'nullable|url',
            'navigation' => 'nullable',
            'params' => 'nullable',
            'token' => 'required',
        ]);

        try {
            $factory = (new Factory)
            ->withServiceAccount(public_path('/google/firebase-admin.json'));
            $cloudMessaging = $factory->createMessaging();
            $fcmMessage = CloudMessage::withTarget('token', $validated['token'])
                ->withNotification([
                    'title' => $validated['title'],
                    'body' => $validated['body'],
                    // icon
                    'icon' => 'https://neovista.karimtech.com/images/icon.png'
                ])
                ->withData([
                    'image' => $validated['image'],
                    'url' => $validated['url'],
                    'navigation' => $validated['navigation'],
                    'params' => json_encode($validated['params']),
                ]);
            $cloudMessaging->send($fcmMessage);
            
            return response()->json(['message' => 'Notification sent successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}
