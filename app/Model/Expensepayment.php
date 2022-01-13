<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Expensepayment extends Model
{
    protected $table = 'expensepayments';
    protected $guarded = [];

    public function lawercase()
    {
        return $this->belongsTo(LawyerCase::class, 'case_id', 'id');
    }
}
