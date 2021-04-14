<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stream extends Model
{
    protected $fillable = [
        'name',
        'event-id',
        'company_id',
        'opis',
        'date'
    ];
    public function event(){
        return $this->belongsTo(Event::class);
    }
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function photo(){
        return $this->hasOne(Photo::class);
    }
}
