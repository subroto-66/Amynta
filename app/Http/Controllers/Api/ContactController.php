<?php

namespace App\Http\Controllers\Api;

use App\Models\ContactUs;
use App\Models\ReachOut;
use Illuminate\Http\Request;

class ContactController
{
    public function reachOut()
    {
        $reachOut = ReachOut::orderBy('id', 'desc')->get();

        return response()->json([
            'success' => true,
            'data' => $reachOut,
        ], 200);
    }

    public function store(Request $request)
    {

        $request->validate([
            'full_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:14',
            'message' => 'required',
        ]);

        $contact = new ContactUs;
        $contact->full_name = $request->full_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->save();

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully.',
        ], 200);
    }
}
