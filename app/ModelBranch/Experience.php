<?php

namespace App\ModelBranch;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
	public $timestamps = false;
	protected $table = 'experiences';
	protected $fillable = [
        'experiences_name', 'recruitments_id',
    ];
    public function recruitment()
    {
        return $this->belongsTo(Recruitment::class);
    }
}
