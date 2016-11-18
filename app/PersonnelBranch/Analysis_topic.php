<?php

namespace App\PersonnelBranch;

use Illuminate\Database\Eloquent\Model;

class Analysis_topic extends Model
{
    protected $table = 'analysis_topic';
    protected $fillable = ['topic','as_status'];
}
