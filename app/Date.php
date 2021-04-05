<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use function Symfony\Component\Translation\t;

class Date extends Model
{
    protected $fillable = [
        'date',
    ];

    public function event(){
        return $this->belongsTo(Event::class);
    }
    public function hours(){
        return $this->hasMany(Hour::class);
    }

}
