<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{
    protected $table = 'expensess';
    protected $fillable = ['date', 'value', 'details','case_id'];

    public function lawercase()
    {
        return $this->belongsTo(LawyerCase::class, 'case_id', 'id');
    }

}
