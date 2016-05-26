<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recruitments_status extends Model
{
    protected $table = 'recruitments_status';
	protected $fillable = [
        'status', 'recruitments_id','user_id'
    ];
}
