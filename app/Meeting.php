<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Meeting extends Model
{
    protected $fillable = [
        'hours',
        'date',
        'status'

    ];
    public function company(){
        return $this->belongsTo(Company::class);
    }
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function notes(){
        return $this->hasMany(Note::class);
    }
    public function hour(){
        return $this->belongsTo(Hour::class);
    }
}
