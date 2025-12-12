<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep4Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Step4Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_4', []);

        $seoData = (new SEOData)->markAsNoindex();

        return view('detailed-form.step-4', compact('data', 'seoData'));
    }

    public function store(StoreStep4Request $request)
    {
        session()->put('detailed_form.step_4', $request->validated());

        return redirect()->route('detailed-form.step5.show');
    }
}
