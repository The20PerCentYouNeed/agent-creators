<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep2Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Step2Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_2', []);

        $seoData = (new SEOData)->markAsNoindex();

        return view('detailed-form.step-2', compact('data', 'seoData'));
    }

    public function store(StoreStep2Request $request)
    {
        session()->put('detailed_form.step_2', $request->validated());

        return redirect()->route('detailed-form.step3.show');
    }
}
