<?php

namespace App\Http\Controllers;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact.index');
    }

    // public function create(Request $request)
    // {
    // $data = $this->validate($request, [
    // 'firstname' => 'required|max:255',
    // 'lastname' => 'required|max:255',
    // 'phone' => 'required|min:8|max:20|regex:/^(\+)?[0-9]{8,20}$/',
    // 'email' => 'required|email',
    // 'order_id' => 'sometimes|nullable|numeric|min:1000000',
    // 'message' => 'required|min:10',
    // 'contact_subject' => 'required',
    // ]);
    // switch ($data['contact_subject']) {
    // case 'other-information':
    // case 'b2b-wholesale-franchise':
    // Notification::route('mail', 'info@lynneshop.com')
    // ->notify(new ContactMessage($data));
    // break;
    // case 'website-orders':
    // default:
    // Notification::route('mail', config('mail.from.address'))
    // ->notify(new ContactMessage($data));
    // }
    // return redirect(route('contact-thankyou'));
    // }
}
