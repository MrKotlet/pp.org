<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Date extends Model
{
    protected $fillable = [
        'date',
    ];

    public function event()
    {
        return $this->belongsTo(Event::class);
    }

    public function hours()
    {
        return $this->hasMany(Hour::class);
    }

    public function showDate()
    {
        $month = $this->month;
        if ($month < 10) {
        $month = '0'.$month;
        }


        return $this->day . '.' . $month;
    }

}
