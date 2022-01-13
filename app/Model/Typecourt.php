<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Typecourt extends Model
{
    protected $guarded = [];
    protected $table = 'typecourts';


    public function typecourt()
    {
        return $this->belongsTo(Court::class, 'court_id', 'id');
    }


    public function seessiots()
    {
        return $this->hasMany(Ssesiot::class, 'typecourt_id', 'id');
    }
}
