<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $guarded = [];

    public function Item()
    {
        return $this->belongsTo(Item::class);
    }

    public function Supplier()
    {
        return $this->belongsTo(Supplier::class);
    }
}
