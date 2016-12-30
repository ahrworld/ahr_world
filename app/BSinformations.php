<?php

namespace App;
use App\User;
use App\PluralAdd\Employ;
use Illuminate\Database\Eloquent\Model;

class BSinformations extends Model
{
	protected $table = 'bsinformations';

    protected $fillable = [
        'company_name', 'name', 'user_language_id', 'web_url',
        'address', 'interview','test_process1','test_process2','test_process3',
        'set_up','nationality_members','member_count','capital','amount_of_sales','status'
    ];
    /* usertest功用不明
    */
    public function usertest()
    {
        return $this->belongsTo(User::class);
    }

    public function employ()
    {
        return $this->hasMany(Employ::class);
    }
}
