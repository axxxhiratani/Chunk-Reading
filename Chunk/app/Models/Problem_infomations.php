<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Big_problems;
use App\Models\Logdata;
use App\Models\Problem_contents;

class Problem_infomations extends Model
{
    use HasFactory;

    protected $fillable = [
        'big_problem_id',
        'body',
        'answer',
    ];

    // $problem_informaion->big_problem
    public function big_problem()
    {
        return $this->belongsTo(Big_problems::class);
    }


    // $problem_informaion->logdatas
    public function logdatas()
    {
        return $this->hasMany(Logdata::class);
    }


    // $problem_informaion->problem_contents
    public function problem_contents()
    {
        return $this->hasMany(Problem_contents::class);
    }
}
