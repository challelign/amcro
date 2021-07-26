<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tvprogram extends Model
{

    protected $fillable = [
        'program_ken_id', 'program_mitelalefbet', 'today_date',
        'program_yizet',
        'user_id'
    ];

    public function programKen()
    {
        return $this->belongsTo(ProgramKen::class);

    }

    public function programMeleya()
    {
        return $this->belongsTo(ProgramMeleya::class);

    }
    public function tvmitelalefbet()
    {
        return $this->belongsTo(Tvmitelalefbet::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
