<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep3Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Step3Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_3', []);

        $seoData = (new SEOData)->markAsNoindex();

        return view('detailed-form.step-3', compact('data', 'seoData'));
    }

    public function store(StoreStep3Request $request)
    {
        session()->put('detailed_form.step_3', $request->validated());

        return redirect()->route('detailed-form.step4.show');
    }
}
