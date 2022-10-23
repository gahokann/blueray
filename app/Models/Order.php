<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function orders() {
        return $this->hasOne(User::class);
    }

    public function lots() {
        return $this->hasOne(Lot::class, 'id', 'lot_id');
    }

    public function status() {
        return $this->hasOne(OrderStatus::class, 'id', 'status_id');
    }

    public function users() {
        return $this->hasOne(User::class, 'id', 'executor_id');
    }

    public function usersClient() {
        return $this->hasOne(User::class, 'id', 'client_id');
    }

}
