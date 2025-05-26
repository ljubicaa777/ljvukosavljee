<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    public function tea() {
        return $this->belongsTo(Tea::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
