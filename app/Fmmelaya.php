<?php

namespace App;
use App\Fmprogram;
use Illuminate\Database\Eloquent\Model;

class Fmmelaya extends Model
{
    protected $fillable = [

        'name','yeteshete'

    ];

    public function fmprogram()
    {
        return $this->belongsTo(Fmprogram::class);
    }
}
