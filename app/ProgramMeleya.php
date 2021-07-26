<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramMeleya extends Model
{
    protected $fillable = [

        'name','yeteshete'

    ];


    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
