<?php

namespace App;
use App\Fmprogram;
use Illuminate\Database\Eloquent\Model;

class Fmmereja extends Model
{
    protected $fillable = [
        'program_ken_id', 'today_date','user_id',
        'program_mitelalefbet', 'mereja', 'music',

    ];


    public function fmprogram()
    {
        return $this->belongsTo(Fmprogram::class);
    }

    function programKen()
    {
        return $this->belongsTo(ProgramKen::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
