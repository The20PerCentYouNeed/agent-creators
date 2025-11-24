<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep9Request;

class Step9Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_9', []);

        return view('detailed-form.step-9', compact('data'));
    }

    public function submit(StoreStep9Request $request)
    {
        $data = $request->validated();

        if ($request->hasFile('additional_files')) {
            $filePaths = [];
            foreach ($request->file('additional_files') as $file) {
                $filePaths[] = $file->store('detailed-form-uploads', 'public');
            }
            $data['additional_file_paths'] = $filePaths;
        }

        session()->put('detailed_form.step_9', $data);

        $allData = session('detailed_form');

        // TODO: Send notification email with all form data.
        // Notification::route('mail', config('mail.contact.address'))
        // ->notify(new DetailedFormSubmitted($allData)).
        session()->forget('detailed_form');

        return redirect()->route('detailed-form.thankyou');
    }

    public function thankYou()
    {
        return view('detailed-form.thank-you');
    }
}
