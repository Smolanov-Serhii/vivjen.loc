<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QuizController extends Controller
{
    public function store(Request $request)
    {
        if (!empty($request->get('ids'))) {
            Auth::user()->client->taxonomy_items()->sync($request->get('ids') ?? []);
        }

        return true;
    }
}