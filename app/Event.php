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
        'year',
        'startMonth',
        'endMonth',
        'startDay',
        'endDay',
    ];

    public function streams()
    {
        return $this->hasMany(Stream::class);
    }

    public function dates()
    {
        return $this->hasMany(Date::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function logo(){
        $logo = Photo::where('event_id',$this->id)->where('type','logo')->first();



        return $logo;

    }
    public function main(){
        $main = Photo::where('event_id',$this->id)->where('type','main')->first();



        return $main;

    }
    public function others(){
        $others = Photo::where('event_id',$this->id)->where('type','other')->get();



        return $others;

    }



    public function showDate()
    {
        $s = $this->startMonth;
        $e = $this->endMonth;


        if($s<10){
            $s = '0'.$s;
        }

        if($e<10){
            $e = '0'.$e;
        }


        $sd = $this->startDay;
        $ed = $this->endDay;
        if($sd === 0){
            return $s.'.'.$this->year;
        }

        if ($s === $e) {
            return $sd . '-' . $ed . '.' . $s;
        }
        return $sd . '.' . $s . '-' . $ed . '.' . $e;


    }
    public function getLocationAttribute($value){
        return ucfirst($value);
    }

}
