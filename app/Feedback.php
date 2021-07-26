<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{

    protected $fillable = [
        'program_ken', 'today_date','user_id','feedback_category',
        'program_mitelalefbet', 'feedback',

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
