<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function items() {
        return $this->hasMany(Item::class);
    } 

    public function tea()
    {
        return $this->belongsTo(Tea::class);
    } 

    protected $fillable = [
        'user_id',
        'tea_id',
        'kolicina',
        'ukupno',
        'status',
    ];
}
