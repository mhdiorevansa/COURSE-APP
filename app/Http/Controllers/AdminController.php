<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use App\Models\User;
use App\Models\forum;
use App\Models\kelas;
use App\Models\materi;
use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index()
    {
        $UserCount = User::where('role_id', '!=', 1)->count();
        $KelasCount = kelas::count();
        $MateriCount = materi::count();
        $QuizCount = quiz::count();
        return view('admin.dashboard', ['user_count' => $UserCount, 'kelas_count' => $KelasCount, 'materi_count' => $MateriCount, 'quiz_count' => $QuizCount]);
    }
    public function user(Request $request)
    {
        $keyword = $request->keyword;
        $user = User::with('role')->where('role_id', '!=', 1)->where('username', 'LIKE', '%' . $keyword . '%')->get();
        return view('admin.user', ['user' => $user]);
    }
    public function destroyUser($id)
    {
        $deletedUser = user::findOrFail($id);
        $deletedUser->delete();
        if ($deletedUser) {
            Session::flash('status-user-deleted', 'success');
            Session::flash('message-user-deleted', 'user berhasil dihapus!');
        }
        return redirect('/admin-user');
    }
    public function all_kelas(Request $request)
    {
        $keyword = $request->keyword;
        $allKelas = kelas::where('nama_kelas', 'LIKE', '%' . $keyword . '%')->get();
        return view('Admin.all-kelas', ['allKelas' => $allKelas]);
    }
    public function control_kelas(Request $request)
    {
        $keyword = $request->keyword;
        $controlKelas = kelas::where('nama_kelas', 'LIKE', '%' . $keyword . '%')->get();
        return view('Admin.control-kelas', ['controlKelas' => $controlKelas]);
    }
    public function createKelas()
    {
        $addKelas = kelas::get();
        return view('Admin.add-kelas', ['addKelas' => $addKelas]);
    }
    public function storeKelas(Request $request)
    {
        $newName = ''; //nilai default
        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->nama_kelas . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('image/gambar-kelas', $newName);
        }
        $request['gambar_kelas'] = $newName;
        $messages = [
            'nama_kelas.required' => 'nama kelas tidak boleh kosong!',
            'nama_kelas.max' => 'nama kelas maksimal :max karakter!',
            'deskripsi_kelas.required' => 'deskripsi kelas tidak boleh kosong!',
            'deskripsi_kelas.max' => 'deskripsi kelas maksimal :max karakter!',
            'tentang_kelas.required' => 'tentang kelas tidak boleh kosong!',
            'tentang_kelas.max' => 'tentang kelas maksimal :max karakter!',
            'persiapan_kelas.required' => 'persiapan kelas tidak boleh kosong!',
            'persiapan_kelas.max' => 'persiapan kelas maksimal :max karakter!',
            'gambar_kelas.required' => 'gambar kelas tidak boleh kosong!',
        ];
        $this->validate($request, [
            'nama_kelas' => 'required|max:30',
            'deskripsi_kelas' => 'required|max:200',
            'tentang_kelas' => 'required|max:400',
            'persiapan_kelas' => 'required|max:400',
            'gambar_kelas' => 'required'
        ], $messages);
        $kelas = kelas::create($request->all());
        if ($kelas) {
            Session::flash('status-kelas-created', 'success');
            Session::flash('message-kelas-created', 'kelas berhasil ditambahkan!');
        }
        return redirect('/control-kelas');
    }
    public function destroyKelas($id)
    {
        $deletedKelas = kelas::findOrFail($id);
        $deletedKelas->delete();
        if ($deletedKelas) {
            Session::flash('status-kelas-deleted', 'success');
            Session::flash('message-kelas-deleted', 'kelas berhasil dihapus!');
        }
        return redirect('/control-kelas');
    }
    public function editKelas($id)
    {
        $editKelas = kelas::findOrFail($id);
        return view('Admin.edit-kelas', compact('editKelas'));
    }
    public function updateKelas(Request $request, $id)
    {
        $newName = ''; //nilai default
        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->nama_kelas . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('image/gambar-kelas', $newName);
        }
        $request['gambar_kelas'] = $newName;
        $messages = [
            'nama_kelas.required' => 'nama kelas tidak boleh kosong!',
            'nama_kelas.max' => 'nama kelas maksimal :max karakter!',
            'deskripsi_kelas.required' => 'deskripsi kelas tidak boleh kosong!',
            'deskripsi_kelas.max' => 'deskripsi kelas maksimal :max karakter!',
            'tentang_kelas.required' => 'tentang kelas tidak boleh kosong!',
            'tentang_kelas.max' => 'tentang kelas maksimal :max karakter!',
            'persiapan_kelas.required' => 'persiapan kelas tidak boleh kosong!',
            'persiapan_kelas.max' => 'persiapan kelas maksimal :max karakter!',
            'gambar_kelas.required' => 'gambar kelas tidak boleh kosong!',
        ];
        $this->validate($request, [
            'nama_kelas' => 'required|max:30',
            'deskripsi_kelas' => 'required|max:200',
            'tentang_kelas' => 'required|max:400',
            'persiapan_kelas' => 'required|max:400',
            'gambar_kelas' => 'required'
        ], $messages);
        $updateKelas = kelas::findOrFail($id);
        $updateKelas->update($request->all());
        if ($updateKelas) {
            Session::flash('status-kelas-updated', 'success');
            Session::flash('message-kelas-updated', 'kelas berhasil diupdate!');
        }
        return redirect('/control-kelas');
    }
    public function all_materi()
    {
        $allMateri = materi::with('kelas')->get();
        return view('Admin.all-materi', ['allMateri' => $allMateri]);
    }
    public function control_materi()
    {
        $controlMateri = materi::with('kelas')->get();
        return view('Admin.control-materi', ['controlMateri' => $controlMateri]);
    }
    public function createMateri()
    {
        $addMateri = kelas::get();
        // dd($addMateri);
        return view('Admin.add-materi', ['addMateri' => $addMateri]);
    }
    public function uploadImageMateri(Request $request) //upload img with ckeditor
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('storage/image/upload-img-materi/'), $fileName);

            $url = asset('storage/image/upload-img-materi/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
    public function storeMateri(Request $request)
    {
        $messages = [
            'judul_materi.required' => 'judul materi tidak boleh kosong!',
            'judul_materi.max' => 'judul materi maksimal :max karakter',
            'isi_materi.required' => 'isi materi tidak boleh kosong',
            'isi_materi.max' => 'isi materi maksimal :max kata',
            'kelas_id.required' => 'nama kelas tidak boleh kosong',
        ];
        $this->validate($request, [
            'judul_materi' => 'required|max:80',
            'isi_materi' => 'required|max:5000',
            'kelas_id' => 'required'
        ], $messages);
        $materi = materi::create($request->all());
        if ($materi) {
            Session::flash('status-materi-success', 'success');
            Session::flash('message-materi-success', 'materi berhasil ditambahkan!');
        }
        return redirect('/control-materi');
    }
    public function destroyMateri($id)
    {
        $deletedMateri = materi::findOrFail($id);
        $deletedMateri->delete();
        if ($deletedMateri) {
            Session::flash('status-materi-deleted', 'success');
            Session::flash('message-materi-deleted', 'materi berhasil dihapus!');
        }
        return redirect('/control-materi');
    }
    public function editMateri($id)
    {
        $editMateri = materi::with('kelas')->findOrFail($id);
        $kelas = kelas::where('id_kelas', '!=', $editMateri['kelas_id'])->get();
        return view('Admin.edit-materi', compact('editMateri', 'kelas'));
    }
    public function updateMateri(Request $request, $id)
    {
        $messages = [
            'judul_materi.required' => 'judul materi tidak boleh kosong!',
            'judul_materi.max' => 'judul materi maksimal :max karakter',
            'isi_materi.required' => 'isi materi tidak boleh kosong',
            'isi_materi.max' => 'isi materi maksimal :max kata',
            'kelas_id.required' => 'nama kelas tidak boleh kosong',
        ];
        $this->validate($request, [
            'judul_materi' => 'required|max:80',
            'isi_materi' => 'required|max:5000',
            'kelas_id' => 'required'
        ], $messages);

        $updateMateri = materi::findOrFail($id);
        $updateMateri->update($request->all());
        if ($updateMateri) {
            Session::flash('status-materi-updated', 'success');
            Session::flash('message-materi-updated', 'materi berhasil diupdate!');
        }
        return redirect('/control-materi');
    }
    public function controlForum()
    {
        $forum = forum::get();
        return view('Admin.control-forum', ['forum' => $forum]);
    }
    public function destroyForum($id_forum)
    {
        $deletedForum = forum::find($id_forum);
        $deletedForum->delete();
        if ($deletedForum) {
            Session::flash('status-forum-deleted', 'success');
            Session::flash('message-forum-deleted', 'forum berhasil dihapus!');
        }
        return redirect('/control-forum');
    }
    public function controlQuiz()
    {
        $controlQuiz = quiz::get();
        return view('Admin.control-quiz', ['controlQuiz' => $controlQuiz]);
    }
    public function createQuiz()
    {
        return view('Admin.add-quiz');
    }
    public function uploadImageQuiz(Request $request)
    {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName . '_' . time() . '.' . $extension;

            $request->file('upload')->move(public_path('storage/image/upload-img-quiz/'), $fileName);

            $url = asset('storage/image/upload-img-quiz/' . $fileName);
            return response()->json(['fileName' => $fileName, 'uploaded' => 1, 'url' => $url]);
        }
    }
    public function storeQuiz(Request $request)
    {
        $messages = [
            'pertanyaan.required' => 'pertanyaan tidak boleh kosong!',
            'pertanyaan.max' => 'pertanyaan maksimal :max karakter',
            'jawaban.required' => 'jawaban tidak boleh kosong',
            'jawaban.max' => 'jawaban maksimal :max kata',
        ];
        $this->validate($request, [
            'pertanyaan' => 'required|max:400',
            'jawaban' => 'required|max:400',
        ], $messages);
        $quiz = quiz::create($request->all());
        if ($quiz) {
            Session::flash('status-quiz-created', 'success');
            Session::flash('message-quiz-created', 'quiz berhasil ditambahkan!');
        }
        return redirect('/control-quiz');
    }
    public function destroyQuiz($id_quiz)
    {
        $deletedQuiz = quiz::find($id_quiz);
        $deletedQuiz->delete();
        if ($deletedQuiz) {
            Session::flash('status-quiz-deleted', 'success');
            Session::flash('message-quiz-deleted', 'quiz berhasil dihapus!');
        }
        return redirect('/control-quiz');
    }
    public function editQuiz($id)
    {
        $editQuiz = quiz::findOrFail($id);
        return view('Admin.edit-quiz', compact('editQuiz', 'kelas'));
    }
    public function updateQuiz(Request $request, $id)
    {
        $messages = [
            'pertanyaan.required' => 'pertanyaan tidak boleh kosong!',
            'pertanyaan.max' => 'pertanyaan maksimal :max karakter',
            'jawaban.required' => 'jawaban tidak boleh kosong',
            'jawaban.max' => 'jawaban maksimal :max kata',
        ];
        $this->validate($request, [
            'pertanyaan' => 'required|max:400',
            'jawaban' => 'required|max:400',
        ], $messages);
        $updateQuiz = quiz::findOrFail($id);
        $updateQuiz->update($request->all());
        if ($updateQuiz) {
            Session::flash('status-quiz-updated', 'success');
            Session::flash('message-quiz-updated', 'quiz berhasil diupdate!');
        }
        return redirect('/control-quiz');
    }
    public function controlFeedback()
    {
        $feedback = feedback::with('user')->get();
        return view('Admin.control-feedback', ['feedback' => $feedback]);
    }
    public function destroyFeedback($id_feedback)
    {
        $deletedFeedback = feedback::find($id_feedback);
        $deletedFeedback->delete();
        if ($deletedFeedback) {
            Session::flash('status-feedback-deleted', 'success');
            Session::flash('message-feedback-deleted', 'feedback berhasil dihapus!');
        }
        return redirect('/control-feedback');
    }
}
