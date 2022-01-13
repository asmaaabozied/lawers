<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Ssesiot extends Model
{
    protected $guarded = [];
    protected $table = 'ssesiots';


    public function cases()
    {
        return $this->belongsTo(LawyerCase::class, 'case_id', 'id');
    }


    public function lawer()
    {
        return $this->belongsTo(Lawyer::class, 'lawyer_id', 'id');
    }

    public function statement()
    {
        return $this->belongsTo(Dstatement::class, 'dstatement_id', 'id');
    }

    public function decision()
    {
        return $this->belongsTo(Decision::class, 'decision_id');
    }

    public function type()
    {
        return $this->belongsTo(Typecourt::class, 'typecourt_id', 'id');
    }
}
