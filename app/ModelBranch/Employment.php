<?php

namespace App\ModelBranch;
use App\Recruitment;
use Illuminate\Database\Eloquent\Model;

class Employment extends Model
{
    protected $table = 'employments';
    protected $fillable = [
        'employment_name', 'recruitments_id',
    ];
    public function recruitment()
    {
        return $this->belongsTo(Recruitment::class);
    }
}
