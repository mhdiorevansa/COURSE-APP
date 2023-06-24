<?php

namespace App\Http\Controllers;

use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FeedbackController extends Controller
{
    public function feedbackIndex()
    {
        $feedback = feedback::with('user')->orderBy('created_at')->paginate(5);
        return view('feedback', compact('feedback'));
    }
    public function storeFeedback(Request $request)
    {
        $messages = [
            'isi_feedback.required' => 'feedback tidak boleh kosong',
            'isi_feedback.max' => 'feedback maksimal :max kata',
        ];
        $this->validate($request, [
            'isi_feedback' => 'required|max:150',
        ], $messages);

        $request->request->add(['user_id' => auth()->user()->id_user]);
        feedback::create($request->all());
        return redirect('/belajar')->with('toast_success', 'Feedback berhail ditambahkan!');
    }
}
