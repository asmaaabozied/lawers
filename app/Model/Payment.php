<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $guarded = [];

    public function case()
    {
        return $this->belongsTo(LawyerCase::class, 'case_id', 'id');
    }
}
