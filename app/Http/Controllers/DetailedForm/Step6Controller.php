<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep6Request;
use RalphJSmit\Laravel\SEO\Support\SEOData;

class Step6Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_6', []);

        $seoData = (new SEOData)->markAsNoindex();

        return view('detailed-form.step-6', compact('data', 'seoData'));
    }

    public function store(StoreStep6Request $request)
    {
        session()->put('detailed_form.step_6', $request->validated());

        return redirect()->route('detailed-form.step7.show');
    }
}
