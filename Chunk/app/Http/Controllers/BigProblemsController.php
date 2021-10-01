<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Big_problems;
use App\Http\Requests\BigproblemsRequest;

class BigProblemsController extends Controller
{

    //遷移
    public function transStoreBig(){

        return view('admin.storeBig');
    }

    // データベースに保存されている大問を全て抽出し小門追加画面に遷移させる。
    public function problemList(){

        $bigs = Big_problems::latest()->get();

        return view('admin.listBig')
            ->with(['bigs' => $bigs]);

    }

    // データベースに追加する
    public function storeBig(BigproblemsRequest $request){

        $big = new Big_problems();
        $big->name = $request->name;
        $big->save();

        return redirect()
            ->route('admin.problemList');
    }

    // データベースにから消去する
    public function bigDestory(Big_problems $big){

        $big->delete();

        return redirect()
            ->route('admin.problemList');
    }



    public function home(){

        $bigs = Big_problems::latest()->get();

        return view('student.home')
            ->with(['bigs' => $bigs]);
    }

}
