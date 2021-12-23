<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mastawokia extends Model
{
    // 'program_ken_id' => 'required',
    //                'program_mitelalefbet' => 'required',
    //                'today_date' => 'required',
    //                'mastawokia_tekuam.*' => 'required',
    //                'mastawokia_file.*' => 'required',
    //                'mastawokia_gize.*' => 'required',
    //                'mastawokia_mitelalefbet_seat.*' => 'required',
    //                'mastawokia_diggmosh.*' => 'required',
    //                'mastawokia_Yetestenagedew_meten.*' => 'required',


    protected $fillable = [
        'program_ken_id', 'mastawokia_mitelalefbet', 'today_date',
        'mastawokia_tekuam', 'mastawokia_file', 'mastawokia_gize',
        'mastawokia_mitelalefbet_seat', 'mastawokia_diggmosh',
        'mastawokia_Yetestenagedew_meten','user_id','position'
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

}
