<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class room extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'roomType', 'NameOfRoom', 'price','availableRoom','property_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'property_id'
    ];
}
