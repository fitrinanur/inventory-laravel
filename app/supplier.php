<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\City;

class Supplier extends Model
{
    protected $guarded= [];
    public function City()
    {
        return $this->belongsTo(City::class);
    }
}
