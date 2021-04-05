<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Event extends Model
{


    protected $fillable = [
        'name',
        'visible',
        'opis',
        'homepage',
        'date',
    ];
public function streams(){
    return $this->hasMany(Stream::class);
}
public function dates(){
    return $this->hasMany(Date::class);
}


}
