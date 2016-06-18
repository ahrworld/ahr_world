<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    public $timestamps = false;
    protected $table = 'notice';
    protected $primaryKey = 'id';
    protected $fillable = ['notice_title','notice_content','data_status','status','favorite','get_user_id','post_user_id','create_time'];
}
