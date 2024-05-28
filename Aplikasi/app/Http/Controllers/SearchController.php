<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class SearchController extends Controller
{
    public function index()
    {
        return Redirect::route('search.show', ['show' => 'questions']);
    }

    public function search(string $show, Request $request)
    {
        $query = request()->query('q');

        if ($show === "questions") {
            $questions = $query ? Question::with(['user'])->where('text', 'like', "%$query%")->orderByDesc('updated_at')->get() : false;
            return view('search', compact('questions', 'query'));
        } elseif ($show === "users") {
            $users = $query ? User::whereAny(['name', 'username'], 'like', "%$query%")->orderByDesc('updated_at')->get() : false;
            return view('search', compact('users', 'query'));
        }
        return response()->view('404', [], 404);
    }
}
