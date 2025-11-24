<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep1Request;

class Step1Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_1', []);

        return view('detailed-form.step-1', compact('data'));
    }

    public function store(StoreStep1Request $request)
    {
        session()->put('detailed_form.step_1', $request->validated());

        return redirect()->route('detailed-form.step2.show');
    }
}
