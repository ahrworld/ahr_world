<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BSinformations extends Model
{
	protected $table = 'BSinformations';
	
    protected $fillable = [
        'company_name', 'name', 'user_language_id', 'web_url',
        'address', 'employ_id','interview','test_process1','test_process2','test_process3',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
