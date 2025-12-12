<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep5Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Step5Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_5', []);

        $seoData = (new SEOData)->markAsNoindex();

        return view('detailed-form.step-5', compact('data', 'seoData'));
    }

    public function store(StoreStep5Request $request)
    {
        session()->put('detailed_form.step_5', $request->validated());

        return redirect()->route('detailed-form.step6.show');
    }
}
