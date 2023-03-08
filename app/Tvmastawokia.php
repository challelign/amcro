<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tvmastawokia extends Model
{
    protected $fillable = [
        'program_ken_id', 'mastawokia_mitelalefbet', 'today_date',
        'mastawokia_tekuam', 'mastawokia_file', 'mastawokia_gize',
        'mastawokia_mitelalefbet_seat', 'mastawokia_diggmosh',
        'mastawokia_video_id',
        'mastawokia_text','position',
        'user_id','tvmall'
    ];

    public function programKen()
    {
        return $this->belongsTo(ProgramKen::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
