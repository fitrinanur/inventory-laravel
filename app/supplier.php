<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;

class supplier extends Model
{
    protected $guarded= [];
    public function City()
    {
        return $this->belongsTo(City::class);
    }
}
