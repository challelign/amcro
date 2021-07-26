<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Miraf extends Model
{

    public function merehagibr(){
        return $this->belongsTo(Merehagibr::class);
    }
}
