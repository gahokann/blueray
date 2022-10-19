<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function lot() {
        return $this->belongsToMany(Lot::class, 'lot_countries');
    }
}
