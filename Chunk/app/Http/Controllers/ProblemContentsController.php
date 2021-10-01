<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Problem_infomations;
use App\Models\Problem_contents;

class ProblemContentsController extends Controller
{
    //更新する小問のidを取得
    // セッションに保存されたコンテンツの値を取得
    public function proContStore(){

        $target = Problem_infomations::latest()->get()->first()->id;
        $contents = session()->get('contents');

        for($i=1; $i<=$contents['row']; $i++) {

            $cont = new Problem_contents();
            $cont->problem_infomations_id = $target;
            $cont->row = $i;
            $cont->pro1 = $contents['pro1_'.$i];
            $cont->pro2 = $contents['pro2_'.$i];
            $cont->save();
        }
        return redirect()
            ->route('admin.problemList');
    }


    public function study(Problem_infomations $info){

        $conts = new Problem_contents();
        $conts = $info->problem_contents;


        return view('student.study')
        ->with(['info' => $info,'conts' => $conts]);
    }
}
