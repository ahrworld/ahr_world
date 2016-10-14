<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Interview_time extends Model
{
    public $timestamps = false;
	protected $table = 'interview_time';
	protected $fillable = [
        'time', 'bsinformations_id','personnels_id','country','status','time_status','year','month','day'
    ];
}
