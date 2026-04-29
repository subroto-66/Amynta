<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactUs;
use Inertia\Inertia;

class ContactUsController
{
    public function index()
    {
        $contact = ContactUs::orderBy('id', 'desc')->get();
        return inertia('Contact/Index', [
            'contact' => $contact,
        ]);
    }

    public function edit($id){
        $contact = ContactUs::find($id);
        return inertia('Contact/Edit', [
            'contact' => $contact,
        ]);
    }

    public function update(Request $request, $id){

        $request->validate([
            'full_name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required',
            'status' => 'required',
        ]);

        $contact = ContactUs::find($id);
        $contact->full_name = $request->full_name;
        $contact->email = $request->email;
        $contact->phone = $request->phone;
        $contact->message = $request->message;
        $contact->status = $request->status;
        $contact->save();
        return redirect()->route('contact.index')->with('success', 'Contact Us updated successfully.');
    }

    public function destroy($id){
        $contact = ContactUs::find($id);
        $contact->delete();
        return redirect()->route('contact.index')->with('success', 'Contact Us deleted successfully.');
    }


}
