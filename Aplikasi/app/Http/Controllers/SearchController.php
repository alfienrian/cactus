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
            $results = $query ? Question::with(['user'])->where('text', 'like', "%$query%")->orderByDesc('updated_at')->get() : false;
            return view('search', compact('results', 'show', 'query'));
        } elseif ($show === "users") {
            $results = $query ? User::whereAny(['name', 'username'], 'like', "%$query%")->orderByDesc('updated_at')->get() : false;
            return view('search', compact('results', 'show', 'query'));
        }
        return response()->view('404', [], 404);
    }
}
