<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('contact-us');
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email'],
            'message' => ['required', 'min:20']
        ]);

        // Save the data to the database
        ContactUs::create([
           'name' => $request->name,
           'email' => $request->email,
           'message' => $request->message
        ]);

        // Return thank you message
//        return redirect('contact-us'); // Redirect using path
//        return redirect()->route('contact_us'); // Redirect using name
//        return to_route('contact_us');

        return back()->with('success', 'Thank you for contacting us!');
    }
}
