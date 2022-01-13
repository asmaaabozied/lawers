<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Dstatement extends Model
{
    protected $guarded = [];
    protected $table = 'dstatements';

    public function typecourt()
    {
        return $this->belongsTo(Typecourt::class, 'typecourt_id', 'id');
    }
}
