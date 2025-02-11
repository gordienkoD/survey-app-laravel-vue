<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Inertia\Inertia;
use App\Models\Survey;
use Illuminate\Support\Facades\Auth;

class SurveyController extends Controller
{
    public function show(): Response
    {
        return Inertia::render('Survey/Form');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'answers' => ['required', 'array'],
        ]);

        Survey::updateOrCreate(
            ['user_id' => Auth::id()],
            ['answers' => json_encode($validated['answers'])]
        );

        return redirect()->route('survey.stats');
    }

    public function stats(): Response
    {
        return Inertia::render('Survey/Stats', [
            'data' => Survey::select('answers')->get(),
        ]);
    }
}
