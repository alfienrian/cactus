<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View {
        $questions = Question::withCount(['answers'])->orderByDesc('updated_at')->get();

        return view('home', compact('questions'));
    }
}
