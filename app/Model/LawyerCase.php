<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class LawyerCase extends Model
{
    protected $guarded = [];
    protected $table = 'cases';

    public function documents()
    {
        return $this->hasMany(Document::class, 'case_id', 'id');
    }

    public function payments()
    {
        return $this->hasMany(Payment::class, 'case_id', 'id');
    }

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id', 'id');
    }

    public function type()
    {
        return $this->belongsTo(Type::class, 'typecase_id', 'id');
    }

    public function expensess()
    {
        return $this->hasMany(Expenses::class, 'case_id', 'id');
    }

    public function expensepayment()
    {
        return $this->hasMany(Expensepayment::class, 'case_id', 'id');
    }

    public function statuscase()
    {
        return $this->belongsTo(Statuscase::class, 'statuscase_id', 'id');
    }

    public function lawercase()
    {
        return $this->belongsTo(Lawercase::class, 'lawercase_id', 'id');
    }


}
