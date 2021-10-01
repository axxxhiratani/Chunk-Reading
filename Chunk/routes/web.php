<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChunkController;
use App\Models\User;

// コントローラーの定義
use App\Http\Controllers\BigProblemsController;
use App\Http\Controllers\ProblemInfomationsController;
use App\Http\Controllers\ProblemContentsController;
use App\Http\Controllers\Problem_infomations;
use App\Http\Controllers\LogdataController;

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

Route::get('/', function () {
    return view('welcome');
});

// ログイン処理
//ここで分岐させる
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {

    if(Auth::user()->name == 'root' and Auth::user()->id == 2 ){

        return view('admin.home');

    }else{

        return redirect()
            ->route('student.home');
    }



})->name('dashboard');



/*
   管理者ページの遷移情報
*/
Route::get('admin.home', function () {
    return view('admin.home');
})->name('admin.home');


//大門追加画面へ遷移
Route::get('/transStoreBig', [BigProblemsController::class, 'transStoreBig'])
    ->name('admin.transStoreBig');


// 大門追加の実行
Route::post('/storeBig', [BigProblemsController::class, 'storeBig'])
    ->name('admin.storeBig');

//大門一覧を表示
Route::get('/problemList', [BigProblemsController::class, 'problemList'])
    ->name('admin.problemList');


//小門追加画面へ遷移(選択した大問の情報を送信)
Route::get('/problemStore/{big}', [ProblemInfomationsController::class, 'problemStore'])
    ->name('admin.problemStore')
    ->where('big','[0-9]+');

//大問の消去
Route::get('/bigDestory/{big}', [BigProblemsController::class, 'bigDestory'])
    ->name('admin.bigDestroy')
    ->where('big','[0-9]+');


//小問の登録１
Route::post('/problemStore/routeadmin.proInfoStore', [ProblemInfomationsController::class, 'proInfoStore'])
    ->name('admin.proInfoStore');


// 小問の登録2
Route::get('/proContStore', [ProblemContentsController::class, 'proContStore'])
    ->name('admin.proContStore');


//選択した大問の問題一覧を表示(選択した大問の情報を送信)
Route::get('/problemBigList/{big}', [ProblemInfomationsController::class, 'problemBigList'])
    ->name('admin.problemBigList')
    ->where('big','[0-9]+');




/*
ユーザーの遷移情報
*/

//ユーザーのホームページに遷移した。
Route::get('/home', [BigProblemsController::class, 'home'])
    ->name('student.home');

//選択した問題をセッションに登録
Route::get('/maintain/{big}', [ProblemInfomationsController::class, 'maintain'])
    ->name('student.maintain')
    ->where('big','[0-9]+');


// //選択した問題をセッションに登録
// Route::get('/study/{info}', [ProblemContentsController::class, 'study'])
//     ->name('student.study')
//     ->where('info','[0-9]+');


Route::get('/stduy/{info}', [ProblemContentsController::class, 'study'])
    ->name('student.study')
    ->where('big','[0-9]+');


// ユーザーの送信したデータを記録
Route::post('/logstore', [LogdataController::class, 'logstore'])
    ->name('student.logstore');

//問題の移動
Route::get('/problemMove', [ProblemInfomationsController::class, 'problemMove'])
    ->name('student.problemMove');


//問題の移動
Route::get('/problemCheck/{log}', [LogdataController::class, 'problemCheck'])
    ->name('student.problemCheck')
    ->where('log','[0-9]+');
