<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    protected $fillable = ['case_id', 'path', 'name'];

    public function case()
    {
        return $this->belongsTo(LawyerCase::class, 'case_id', 'id');
    }
}
