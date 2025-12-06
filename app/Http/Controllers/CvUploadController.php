<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCvRequest;

class CvUploadController extends Controller
{
    public function store(StoreCvRequest $request)
    {
        $validatedData = $request->validated();

        $cvFile = $request->file('cv_file');
        $filename = time() . '_' . $validatedData['full_name'] . '.' . $cvFile->getClientOriginalExtension();
        $filename = preg_replace('/[^A-Za-z0-9._-]/', '_', $filename);

        $cvPath = $cvFile->storeAs('cvs', $filename);

        // TODO: Dispatch notification email with CV data and file
        // Example: Notification::route('mail', config('mail.from.address'))
        // ->notify(new CvSubmitted($validatedData, $cvPath))
        return redirect()->route('careers')
            ->with('success', __('Thank you! Your CV has been successfully submitted. We will review it and get back to you soon.'));
    }
}
