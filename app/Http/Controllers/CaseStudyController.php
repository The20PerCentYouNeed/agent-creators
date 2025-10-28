<?php

namespace App\Http\Controllers;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = collect(config('case-studies'));

        return view('case-studies.index', compact('caseStudies'));
    }

    public function show(string $slug)
    {
        $caseStudies = collect(config('case-studies'));
        $caseStudy = $caseStudies->firstWhere('slug', $slug);

        if (!$caseStudy) {
            abort(404);
        }

        return view('case-studies.show', compact('caseStudy'));
    }
}
