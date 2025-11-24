<?php

namespace App\Http\Controllers\DetailedForm;

use App\Http\Controllers\Controller;
use App\Http\Requests\DetailedForm\StoreStep7Request;

class Step7Controller extends Controller
{
    public function show()
    {
        $data = session('detailed_form.step_7', []);

        return view('detailed-form.step-7', compact('data'));
    }

    public function store(StoreStep7Request $request)
    {
        session()->put('detailed_form.step_7', $request->validated());

        return redirect()->route('detailed-form.step8.show');
    }
}
