<?php

namespace App\PersonnelBranch;

use Illuminate\Database\Eloquent\Model;

class Experiences_job extends Model
{
    public $timestamps = false;
    protected $table = 'experiences_job';
    protected $fillable = ['experience','year','personnels_id','user_id'];
}
