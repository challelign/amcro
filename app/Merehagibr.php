<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merehagibr extends Model
{

    protected $fillable = [
        'name', 'program_ken_id', 'miraf_id',
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
    public function miraf(){
        return $this->belongsTo(Miraf::class);
    }
}
