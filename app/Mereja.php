<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mereja extends Model
{
    protected $fillable = [
        'program_ken_id', 'today_date','user_id',
        'program_mitelalefbet', 'mereja', 'music',

    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
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
