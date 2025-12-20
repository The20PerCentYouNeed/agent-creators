<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep9Request;
use App\Notifications\DetailedFormSubmitted;
use Illuminate\Support\Facades\Notification;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Step9Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_9', []);

        $seoData = (new SEOData)->markAsNoindex();

        return view('detailed-form.step-9', compact('data', 'seoData'));
    }

    public function submit(StoreStep9Request $request)
    {
        $data = $request->validated();

        if ($request->hasFile('additional_files')) {
            $fileNames = [];
            foreach ($request->file('additional_files') as $file) {
                $file->store('detailed-form-uploads');
                $fileNames[] = $file->getClientOriginalName();
            }
            $data['additional_file_names'] = $fileNames;
        }

        session()->put('detailed_form.step_9', $data);

        $allData = session('detailed_form');

        // Ensure data is serializable for the queue.
        $serializableData = json_decode(json_encode($allData), true);

        dispatch(function () use ($serializableData) {
            Notification::route('mail', config('mail.from.address'))
                ->notify(new DetailedFormSubmitted($serializableData));
        })->afterResponse();

        session()->forget('detailed_form');

        return redirect()->route('detailed-form.thankyou');
    }

    public function thankYou()
    {
        $seoData = (new SEOData)->markAsNoindex();

        return view('detailed-form.thank-you', compact('seoData'));
    }
}
