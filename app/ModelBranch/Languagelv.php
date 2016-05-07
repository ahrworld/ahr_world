<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Languagelv extends Model
{
	protected $table = 'languagelvs';
	protected $fillable = [
        'languagelv_name', 'lv', 'recruitments_id','personnels_id',
    ];
    public function recruitment()
    {
        return $this->belongsTo(Recruitment::class);
    }
}
