<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    protected $guarded = [];
    protected $table = 'decisions';


    public function typecourt()
    {
        return $this->belongsTo(Typecourt::class, 'typecourt_id', 'id');
    }


    public function statementss()
    {
        return $this->belongsTo(Dstatement::class, 'dstatement_id', 'id');
    }


}


