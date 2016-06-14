<?php

namespace App\PersonnelBranch;

use Illuminate\Database\Eloquent\Model;

class Personnels_skill extends Model
{
    public $timestamps = false;
    protected $table = 'personnels_skill';
    protected $fillable = ['personnel_skill','year','personnels_id','user_id'];
}

