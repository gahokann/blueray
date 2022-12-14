<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $fillable = [
        'name',
    ];

    public function Lot() {
        return $this->belongsToMany(Lot::class, 'lot_genres');
    }

}
