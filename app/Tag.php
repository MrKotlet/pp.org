<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Tag extends Model
{


    protected $fillable = [
        'name'
    ];

    public function companies(){
        return $this->belongsToMany(Company::class,'tags_companies');
    }
}
