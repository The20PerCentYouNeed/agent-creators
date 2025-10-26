<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudy::orderBy('order')->get();

        return view('case-studies.index', compact('caseStudies'));
    }

    public function show(string $slug)
    {
        $caseStudy = CaseStudy::where('slug', $slug)->firstOrFail();
        
        return view('case-studies.show', compact('caseStudy'));
    }
}
