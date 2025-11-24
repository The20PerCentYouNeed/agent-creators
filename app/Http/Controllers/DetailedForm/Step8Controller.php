<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep8Request;

class Step8Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_8', []);

        return view('detailed-form.step-8', compact('data'));
    }

    public function store(StoreStep8Request $request)
    {
        session()->put('detailed_form.step_8', $request->validated());

        return redirect()->route('detailed-form.step9.show');
    }
}
