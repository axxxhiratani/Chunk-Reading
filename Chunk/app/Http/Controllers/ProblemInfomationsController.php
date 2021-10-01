<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Problem_infomations;
use App\Models\Big_problems;
use App\Http\Requests\Problem_infomationsRequest;


class ProblemInfomationsController extends Controller
{

    // 小問追加画面に大問のデータを添えて遷移させる。
    public function problemStore(Big_problems $big){

        return view('admin.storeProblem')
            ->with(['big' => $big]);
    }

    //送信データをproplemsinfomationデータベースに保存する
    //contentsの内容は全てセッションに保存する
    public function proInfoStore(Problem_infomationsRequest $request){

        $info = new Problem_infomations();
        $info->big_problems_id = $request->big_problems_id;
        $info->body = $request->body;
        $info->answer = $request->answer;
        $info->save();

        session()->put(['contents' => $request->all()]);


        return redirect()
            ->route('admin.proContStore');
    }

    // データベースから取得
    public function problemBigList(Big_problems $big){

        $infos = new Problem_infomations();
        $infos = $big->problem_infomations;

        return view('admin.listInfo')
            ->with(['infos' => $infos]);
    }


    // ユーザーが選択した問題のデータをchunkシステムに送る
    public function maintain(Big_problems $big){

        $infos = new Problem_infomations();
        $infos = $big->problem_infomations;
        session()->put(['user_infos' => $infos->all()]);

        $infos_array = array();
        for($i=0; $i<count($infos); $i++){
            $infos_array[$i][0]=$i;
            $infos_array[$i][1]=0;
        }
        $infos_array[0][1]=1;

        session()->put(['infos_array' => $infos_array]);

        return redirect()
            ->route('student.study',$infos[$infos_array[0][0]]);
    }


    // 問題を移動する
    public function problemMove(){


        $infos = session()->get('user_infos');
        $infos_array = session()->get('infos_array');

        foreach($infos_array as $index => $value){

            if($value[1]==1){
                $target = $index;
            }
        }
        if($target == (count($infos)-1)){
            return redirect()
            ->route('student.home');

        }else{
            $infos_array[$target][1]=0;
            $infos_array[$target+1][1]=1;
        }

        session()->put(['infos_array' => $infos_array]);

        return redirect()
            ->route('student.study',$infos[$infos_array[$target+1][0]]);

    }



}
