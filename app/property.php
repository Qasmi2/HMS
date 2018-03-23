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
        'propertyType', 'propertyName', 'noOfRoom','streetAddress','sector','Latitude','Longitude','city','user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        
    ];
}

