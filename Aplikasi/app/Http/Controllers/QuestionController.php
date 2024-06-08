<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Notification;
use App\Models\Question;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class QuestionController extends Controller
{
    public function index(): View
    {
        return view('ask');
    }

    public function create(Request $request)
    {
        $validated = $request->validate(
            [
                'question' => ['required', 'string', 'max:450'],
                'question_image' => ['file', 'nullable', Rule::imageFile()->max('1mb')]
            ],
            [
                'question' => 'Tulis pertanyaan yang ingin kamu tanyakan...',
                'question.max' => 'Maaf kamu hanya bisa menulis pertanyaan maksimal 450 karakter',
                'question_image.max' => 'Ukuran gambar terlalu besar! maks 1 Mb',
                'question_image.image' => "File yang kamu kirim bukan format gambar"
            ],
        );

        if ($request->hasFile('question_image')) {
            $filePath = request()->file('question_image')->store('postImages', 'public');
            $validated['question_image'] = "/storage/$filePath";
        }

        Question::create([
            'user_id' => Auth::id(),
            'text' => $request->question,
            'image' => $validated['question_image'] ?? null
        ]);

        return Redirect::route('home');
    }

    public function show(string $id): View | Response
    {
        $question = Question::with(['user', 'answers.user'])->find($id);

        if (!$question) return response()->view('404', [], 404);

        return view('question-detail', compact('question'));
    }

    public function answer(string $id, Request $request)
    {
        $request->validate([
            'answer' => ["required", "string", "max:450"],
            'user_id' => ["required", "numeric"],
        ], [
            'answer' => 'Input jawaban tidak boleh kosong',
            'answer.max' => 'Maaf kamu hanya bisa menulis jawaban maksimal 450 karakter'
        ]);

        $answer = Answer::create([
            'user_id' => Auth::user()->id,
            'text' => $request->answer,
            'question_id' => $id
        ]);

        // Kirim notifikasi jika bukan dari user yang sama
        if (Auth::user()->id != $request->user_id) {
            Notification::create([
                'user_id' => $request->user_id,
                'answer_id' => $answer->id,
                'created_at' => now()
            ]);
        }

        return redirect()->back();
    }

    public function deleteQuestion(string $id) {
        $question = Question::find($id);
        if ($question->user_id != Auth::user()->id) return response("You're not authorized to delete this question", 403);

        $question->delete();
        return redirect()->back();
    }

    public function deleteAnswer(string $id) {
        $answer = Answer::find($id);

        if ($answer->user_id != Auth::user()->id) return response("You're not authorized to delete this answer", 403);

        $answer->delete();
        return redirect()->back();
    }
}
