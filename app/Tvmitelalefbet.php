<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tvmitelalefbet extends Model
{
    protected $fillable = [
        'name',
    ];


    public function programcontent()
    {
        return $this->belongsTo(Tvpcontent::class);
    }

    public function merehagibrFm()
    {
        return $this->belongsTo(Fmmerehagibr::class);
    }

    public function tvpprogram()
    {
        return $this->belongsTo(Tvprogram::class);
    }

    public function programKen()
    {
        return $this->belongsTo(ProgramKen::class);
    }
}
