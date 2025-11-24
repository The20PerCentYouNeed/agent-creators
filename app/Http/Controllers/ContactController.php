<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function create(StoreContactRequest $request)
    {
        $validatedData = $request->validated();

        // TODO: Dispatch notification email with contact form data.
        // Example: Notification::route('mail', config('mail.contact.address'))
        // ->notify(new ContactFormSubmitted($validatedData)).
        return redirect()->route('contact.thankyou')
            ->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
