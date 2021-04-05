<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Company extends Model
{


    protected $fillable = [
        'name',
        'verified',
        'opis',
        'homepage',
        'user_id',
    ];
    public function tags(){
        return $this->belongsToMany(Tag::class,'tags_companies');
    }
    public function photos(){
        return $this->hasMany(Photo::class);
    }
    public function user(){
        return $this->belongsTo(User::class);

    }
    public function streams(){
        return $this->hasMany(Stream::class);
    }
    public function hours(){
        return $this->belongsToMany(Hour::class);
    }

    public function meetings(){
        return $this->hasMany(Meeting::class);
    }
}
