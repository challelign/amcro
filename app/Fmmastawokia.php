<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fmmastawokia extends Model
{

    protected $fillable = [
        'program_ken_id', 'mastawokia_mitelalefbet', 'today_date',
        'mastawokia_tekuam', 'mastawokia_file', 'mastawokia_gize',
        'mastawokia_mitelalefbet_seat', 'mastawokia_diggmosh',
        'mastawokia_Yetestenagedew_meten','user_id'
    ];

    public function programKen()
    {
        return $this->belongsTo(ProgramKen::class);

    }


    public function programMeleya()
    {
        return $this->belongsTo(Fmmelaya::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }




}
