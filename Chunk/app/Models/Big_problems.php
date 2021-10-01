<?php

namespace App\Models;
use App\Models\Problem_infomations;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Big_problems extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];


    // $big_problem->problem_infomations
    public function problem_infomations()
    {
        return $this->hasMany(Problem_infomations::class);
    }

}
