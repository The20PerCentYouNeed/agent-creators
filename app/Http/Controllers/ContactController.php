<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactRequest;
use App\Notifications\ContactFormSubmitted;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    public function create(StoreContactRequest $request)
    {
        $validatedData = $request->validated();

        dispatch(function () use ($validatedData) {
            Notification::route('mail', config('mail.from.address'))
                ->notify(new ContactFormSubmitted($validatedData));
        })->afterResponse();

        return redirect()->route('contact.thankyou')
            ->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
