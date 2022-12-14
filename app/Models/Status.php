<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $fillable = [
        'name',
    ];

    public function status() {
        return $this->hasOne(Order::class);
    }

    public function lot() {
        return $this->hasMany(Lot::class);
    }

}
