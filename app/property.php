<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'propertyType', 'propertyName', 'noOfRoom','streetAddress','sector','lat','lon','city','phoneNo','user_id',
        'internet','parking','mess','TvCabel','RoomCleaning','lundary','cctvCamear',
        'AirConditioning','IroningFacilities',
        'PrivateBathroom','Refrigerator','Telephone','AirportShuttle','Wardrobe','Towels','Heating',
        'Restaurant','Shower','pic',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'user_id'
    ];
}

