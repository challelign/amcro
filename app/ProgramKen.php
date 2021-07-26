<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProgramKen extends Model
{
    //


    public function program()
    {
        return $this->hasMany(Program::class);
    }

    public function merehagibr()
    {
        return $this->belongsTo(Merehagibr::class);
    }

    public function programfm()
    {
        return $this->hasMany(Fmprogram::class);
    }

    public function programtv()
    {
        return $this->hasMany(Tvprogram::class);
    }


    public function mitelalefbettv()
    {
        return $this->belongsTo(Tvmitelalefbet::class);
    }

    public function mastawokiatv()
    {
        return $this->belongsTo(Tvmastawokia::class);
    }

    public function feedback()
    {
        return $this->belongsTo(Feedback::class);
    }
}
