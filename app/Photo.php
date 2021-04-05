<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Photo extends Model
{


    protected $fillable = [
        'name',
        'verified',
        'company_id',
        'type'
    ];

public function user(){
    return $this->belongsTo(User::class);
}
public function company(){
    return $this->belongsTo(Company::class);
}

}
