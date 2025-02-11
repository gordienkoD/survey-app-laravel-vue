<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Inertia\Response;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function missingSurveys(): Response|RedirectResponse
    {
        if (!Auth::user() || !Auth::user()->hasRole('admin')) {
            return redirect('/dashboard');
        }

        return Inertia::render('Admin/MissingSurveys', [
            'filledUsers' => User::whereHas('survey')->get(),
            'unfilledUsers' => User::whereDoesntHave('survey')->get(),
        ]);
    }
}
