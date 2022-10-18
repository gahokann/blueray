<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $fillable = [
        'name',
        'img',
        'description',
        'price',
        'rating',
        'genre_id',
        'user_id',
    ];

    public function user() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function genres() {
        return $this->hasOne(Genre::class, 'id', 'genre_id');
    }

}
