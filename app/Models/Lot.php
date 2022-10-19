<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lot extends Model
{
    use HasFactory;
    protected $guarded=[];


    public function user() {
        return $this->hasMany(User::class, 'id', 'user_id');
    }

    public function genre() {
        return $this->belongsToMany(Genre::class, 'lot_genres');
    }

    public function actor() {
        return $this->belongsToMany(Actor::class, 'lot_actors', 'lot_id', 'actor_id');
    }

    public function country() {
        return $this->belongsToMany(Country::class, 'lot_countries');
    }

    public function status() {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    public function order() {
        return $this->hasOne(Order::class);
    }



}
