<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [

        'stream-id',

        'link'
    ];


    public function stream(){
        return $this->belongsTo(Stream::class);
    }
}
