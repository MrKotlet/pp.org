<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
   protected $fillable = [
       'age',
       'subject',
       'user_id',
       'meeting_id',
       'message'


       ];

   public function user(){
       return $this->belongsTo(User::class);
   }

   public function meeting(){
       return $this->belongsTo(Meeting::class);
   }
}
