<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Problem_infomations;

class Problem_contents extends Model
{
    use HasFactory;

    protected $fillable = [
        'problem_infomation_id',
        'row',
        'pro1',
        'pro2',

    ];


    // $problem_content->problem_infomation
    public function problem_infomation()
    {
        return $this->belongsTo(Problem_infomations::class);
    }
}
