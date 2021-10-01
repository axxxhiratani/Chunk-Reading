<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Logdata;


class LogdataController extends Controller
{
    //

    // ユーザーの送信したデータを記録
    public function logstore(Request $request){

        $log = new Logdata();
        $log->user_id = $request->users_id;
        $log->problem_infomation_id = $request->problem_infomations_id;
        $log->answer = $request->answer;
        $log->check = -1;
        $log->save();

        return redirect()
            ->route('student.problemCheck',$log);


    }

    public function problemCheck(logdata $log){

        $info = $log->problem_infomation;

        if($log->answer == $info->answer){
            $check = 1;
        }else{
            $check = 0;
        }

        $log->check = $check;
        $log->save();

        return redirect()
            ->route('student.problemMove');

    }

}
