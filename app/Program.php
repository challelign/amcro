<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{

    protected $fillable = [
        'program_ken_id', 'program_mitelalefbet', 'today_date',
        'program_meleya_id', 'program_yizet', 'program_file',
        'program_artayi', 'program_azegagi', 'program_minute','user_id'
    ];

    public function programKen()
    {
        return $this->belongsTo(ProgramKen::class);

    }

    public function programMeleya()
    {
        return $this->belongsTo(ProgramMeleya::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mereja()
    {
        return $this->belongsTo(Mereja::class);
    }
}
