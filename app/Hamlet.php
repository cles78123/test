<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hamlet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id', 
        'location',
        'number_neighbors',
        'number_households',
        'boy',
        'girl',
        'population',
        'born_population', 
        'death_population',  
        'marriages',
        'divorce',
        'move_in',
        'move_out',
    ];
}
