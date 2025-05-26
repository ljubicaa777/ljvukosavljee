<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function teas() {
        return $this->hasMany(Tea::class);
    }

     protected $fillable = [
        'naziv',
    ];
}
