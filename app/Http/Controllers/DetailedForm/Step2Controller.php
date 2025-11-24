<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep2Request;

class Step2Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_2', []);

        return view('detailed-form.step-2', compact('data'));
    }

    public function store(StoreStep2Request $request)
    {
        session()->put('detailed_form.step_2', $request->validated());

        return redirect()->route('detailed-form.step3.show');
    }
}
