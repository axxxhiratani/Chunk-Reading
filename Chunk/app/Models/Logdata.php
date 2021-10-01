<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Problem_infomations;

class Logdata extends Model
{
    use HasFactory;

    protected $table = 'logdatas';

    protected $fillable = [
        'user_id',
        'problem_infomation_id',
        'answer',
        'check',
    ];

    // $logdata->user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // $logdata->problem_infomation
    public function problem_infomation()
    {
        return $this->belongsTo(Problem_infomations::class);
    }
}
