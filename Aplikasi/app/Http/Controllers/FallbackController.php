<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FallbackController extends Controller
{
    public function index(): Response  {
        return response()->view('404', [], 404);
    }
}
