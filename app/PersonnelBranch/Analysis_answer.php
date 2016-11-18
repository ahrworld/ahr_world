<?php

namespace App\PersonnelBranch;

use Illuminate\Database\Eloquent\Model;

class Analysis_answer extends Model
{
    protected $table = 'analysis_answer';
    protected $fillable = ['as_value_1','as_value_2','as_value_3','as_value_4','as_value_5','as_value_6','as_status_7','as_value_8','user_id'];
}
