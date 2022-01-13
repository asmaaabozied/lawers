<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $guarded = [];
    protected $with = ['cases'];

    public function cases()
    {
        return $this->hasMany(LawyerCase::class, 'client_id', 'id');
    }


    public function payments()
    {
        return $this->hasManyThrough(Payment::class, LawyerCase::class, 'client_id', 'case_id', 'id', 'id');
    }

    public function documents()
    {
        return $this->hasManyThrough(Document::class, LawyerCase::class, 'client_id', 'case_id', 'id', 'id');
    }
}
