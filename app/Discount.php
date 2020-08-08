<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discount extends Model
{
     protected $guarded = ['id'];

      public function plans()
    {
        return $this->belongsToMany(Plan::class, 'discount_plan', 'discount_id', 'plan_id');
    }
}
