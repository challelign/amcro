<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fmmerehagibr extends Model
{
    protected $fillable = [
        'name','tvmitelalefbet_id','program_ken_id'
    ];

    public function programKen()
    {
        return $this->belongsTo(ProgramKen::class);

    }



}
