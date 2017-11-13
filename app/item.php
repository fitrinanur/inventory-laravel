<?php

namespace App;
use App\Category;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $guarded =[];
    public function Category()
    {
        return $this->belongsTo(Category::class);
    }
    
}
