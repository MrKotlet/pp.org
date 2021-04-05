<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    protected $fillable = [
        'hours',
    ];

    public function date(){
        return $this->belongsTo(Date::class);
    }
    public function companies(){
        return $this->belongsToMany(Company::class);
    }
    public function meetings(){
        return $this->hasMany(Meeting::class);
    }
}
