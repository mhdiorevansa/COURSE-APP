<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\RankingController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\LandingPageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('landing-page');
// });

Route::get('/', [LandingPageController::class, 'index']);

Route::get('/myprofile', [UserController::class, 'myProfile'])->middleware('auth');
Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('profile.edit')->middleware('auth');
Route::put('/update-profile', [UserController::class, 'updateProfile'])->name('profile.update')->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'authenticating'])->middleware('guest');
Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/admin-dashboard', [AdminController::class, 'index'])->middleware(['auth', 'admin']);
Route::get('/admin-user', [AdminController::class, 'user'])->middleware(['auth', 'admin']);
Route::delete('/destroy-user/{id}', [AdminController::class, 'destroyUser'])->middleware(['auth', 'admin']);
Route::get('/all-kelas', [AdminController::class, 'all_kelas'])->middleware(['auth', 'admin']);
Route::get('/control-kelas', [AdminController::class, 'control_kelas'])->middleware(['auth', 'admin']);
Route::get('/add-kelas', [AdminController::class, 'createKelas'])->middleware(['auth', 'admin']);
Route::post('/add-kelas', [AdminController::class, 'storeKelas'])->middleware(['auth', 'admin']);
Route::delete('/destroy-kelas/{id}', [AdminController::class, 'destroyKelas'])->middleware(['auth', 'admin']);
Route::get('/update-kelas/{id}', [AdminController::class, 'editKelas'])->middleware(['auth', 'admin']);
Route::put('/update-kelas/{id}', [AdminController::class, 'updateKelas'])->middleware(['auth', 'admin']);
Route::get('/all-materi', [AdminController::class, 'all_materi'])->middleware(['auth', 'admin']);
Route::get('/control-materi', [AdminController::class, 'control_materi'])->middleware(['auth', 'admin']);
Route::get('/add-materi', [AdminController::class, 'createMateri'])->middleware(['auth', 'admin']);
Route::post('/up-img-materi', [AdminController::class, 'uploadImageMateri'])->middleware(['auth', 'admin'])->name('ckeditor.upload'); // upload img ckeditor
Route::post('/add-materi', [AdminController::class, 'storeMateri'])->middleware(['auth', 'admin']);
Route::delete('/destroy-materi/{id}', [AdminController::class, 'destroyMateri'])->middleware(['auth', 'admin'])->name('materi.destroy');
Route::get('/update-materi/{id}', [AdminController::class, 'editMateri'])->middleware(['auth', 'admin']);
Route::put('/update-materi/{id}', [AdminController::class, 'updateMateri'])->middleware(['auth', 'admin']);
Route::get('/control-forum', [AdminController::class, 'controlForum'])->middleware(['auth', 'admin']);
Route::delete('/control-forum/{id_forum}', [AdminController::class, 'destroyForum'])->middleware(['auth', 'admin']);
Route::get('/control-quiz', [AdminController::class, 'controlQuiz'])->middleware(['auth', 'admin']);
Route::get('/add-quiz', [AdminController::class, 'createQuiz'])->middleware(['auth', 'admin']);
Route::post('/up-img-quiz', [AdminController::class, 'uploadImageQuiz'])->middleware(['auth', 'admin'])->name('ckeditor.uploadquiz');
Route::post('/add-quiz', [AdminController::class, 'storeQuiz'])->middleware(['auth', 'admin']);
Route::delete('/destroy-quiz/{id}', [AdminController::class, 'destroyQuiz'])->middleware('auth');
Route::get('/update-quiz/{id}', [AdminController::class, 'editQuiz'])->middleware(['auth', 'admin']);
Route::put('/update-quiz/{id}', [AdminController::class, 'updateQuiz'])->middleware(['auth', 'admin']);
Route::get('/control-feedback', [AdminController::class, 'controlFeedback'])->middleware(['auth', 'admin']);
Route::delete('/destroy-feedback/{id_feedback}', [AdminController::class, 'destroyFeedback'])->middleware(['auth', 'admin']);

Route::get('/belajar', [KelasController::class, 'semuaKelas'])->middleware('auth');
Route::get('/detail-kelas/{id}', [KelasController::class, 'detailKelas'])->middleware('auth');

Route::get('/materi-detail/{id}', [MateriController::class, 'MateriDetail'])->middleware('auth');
Route::get('/code-test/{id}', [MateriController::class, 'codeTest'])->middleware('auth');
Route::get('/materi/{id}/preview', [MateriController::class, 'preview'])->middleware('auth');

Route::get('/forum', [ForumController::class, 'forumIndex'])->middleware('auth');
Route::get('/forum-selected/{id}', [ForumController::class, 'forumIndex'])->middleware('auth');
Route::get('/make-question', [ForumController::class, 'makeQuestion'])->middleware('auth');
Route::post('/up-img-forum', [AdminController::class, 'uploadImageForum'])->middleware('auth')->name('ckeditor.upload');
Route::post('/make-question', [ForumController::class, 'storeQuestion'])->middleware('auth');
Route::get('/detail-question/{id}', [ForumController::class, 'detailQuestion'])->middleware('auth');
Route::post('/up-img-answer', [ForumController::class, 'uploadImageAnswer'])->middleware('auth')->name('ckeditor.uploadimganswer');
Route::post('/answer', [ForumController::class, 'storeAnswer'])->middleware('auth');

Route::get('/ranking', [RankingController::class, 'rankingIndex'])->middleware('auth')->name('ranking');

Route::get('/quiz', [QuizController::class, 'quizIndex'])->middleware('auth');
Route::post('/quiz/reset-score', [QuizController::class, 'resetScore'])->name('quiz.reset-score');
Route::get('/quiz/{id}', [QuizController::class, 'showQuiz'])->middleware('auth')->name('quiz');
Route::post('/quiz/check', [QuizController::class, 'checkAnswer'])->middleware('auth');

Route::get('/feedback', [FeedbackController::class, 'feedbackIndex'])->middleware('auth');
Route::post('/feedback', [FeedbackController::class, 'storeFeedback'])->middleware('auth');

Route::get('artisan/linkstorage', function () {
  $targetFolder = base_path() . '/storage/app/public';
  $linkFolder = $_SERVER['DOCUMENT_ROOT'] . '/storage';
  symlink($targetFolder, $linkFolder);
});

Route::get('artisan/optimize', function () {
  Artisan::call('optimize:clear');
  return response()->json(['optimize' => 'success']);
});
