<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep4Request;

class Step4Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_4', []);

        return view('detailed-form.step-4', compact('data'));
    }

    public function store(StoreStep4Request $request)
    {
        session()->put('detailed_form.step_4', $request->validated());

        return redirect()->route('detailed-form.step5.show');
    }
}
