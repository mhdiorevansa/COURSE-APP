<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\forum;
use App\Models\kelas;
use App\Models\komentar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ForumController extends Controller
{
    public function forumIndex(Request $request)
    {
        $keyword = $request->keyword;
        $kelas = kelas::get();
        $orderBy = $request->input('order_by', 'desc');
        $forum = forum::withCount('komentar')->where('judul_forum', 'LIKE', '%' . $keyword . '%')->with(['user', 'kelas'])->orderByDate($orderBy)->paginate(5);
        return view('forum', ['forum' => $forum, 'kelas' => $kelas, 'orderBy' => $orderBy]);
        // dd($forum);
    }
    public function makeQuestion()
    {
        $forum = kelas::get();
        return view('make-question', ['forum' => $forum]);
    }
    public function uploadImageForum(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('storage/image/upload-img-forum/'), $fileName);

            $url = asset('storage/image/upload-img-forum/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
    public function storeQuestion(Request $request)
    {
        $messages = [
            'judul_forum.required' => 'judul forum tidak boleh kosong!',
            'judul_forum.max' => 'judul forum maksimal :max karakter',
            'kelas_id.required' => 'nama kelas tidak boleh kosong',
            'pertanyaan_forum.required' => 'pertanyaan tidak boleh kosong',
            'pertanyaan_forum.max' => 'isi pertanyaan maksimal :max kata',
        ];
        $this->validate($request, [
            'judul_forum' => 'required|max:50',
            'kelas_id' => 'required',
            'pertanyaan_forum' => 'required|max:300',
        ], $messages);
        $request->request->add(['user_id' => auth()->user()->id_user]);
        $forum = forum::create($request->all());
        if ($forum) {
            Session::flash('status-forum-success', 'success');
            Session::flash('message-forum-success', 'forum berhasil ditambahkan!');
        }
        return redirect('/forum')->with('toast_success', 'Pertanyaan berhasil ditambahkan!');
    }
    public function detailQuestion($id)
    {
        $user = User::all();
        $getQuestion = forum::with(['user', 'komentar', 'kelas'])->findOrFail($id);
        return view('forum-detail', ['getQuestion' => $getQuestion, 'user' => $user]);
    }
    public function uploadImageAnswer(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('storage/image/upload-img-answer/'), $fileName);

            $url = asset('storage/image/upload-img-answer/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
    public function storeAnswer(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id_user]);
        $answer = komentar::create($request->all());
        return redirect()->back();
    }
}
