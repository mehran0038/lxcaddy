<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deliveries extends Model
{
    protected $fillable = [
                        'title',
                        'date'    
    ];
}
