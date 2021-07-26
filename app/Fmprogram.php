<?php

namespace App;
use App\Fmmelaya;
use App\Fmmereja;
use Illuminate\Database\Eloquent\Model;

class Fmprogram extends Model
{

    protected $fillable = [
        'program_ken_id', 'program_mitelalefbet', 'today_date',
        'program_meleya_id', 'program_yizet', 'program_file',
        'program_artayi', 'program_azegagi', 'program_minute','user_id'
    ];


//    public function fmmelaya()
//    {
//        return $this->belongsTo(Fmmelaya::class);
//
//    }

    public function programMeleya()
    {
        return $this->belongsTo(Fmmelaya::class);

    }

    public function programKen()
    {
        return $this->belongsTo(ProgramKen::class);

    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function merejafm()
    {
        return $this->belongsTo(Fmmereja::class);
    }
}
