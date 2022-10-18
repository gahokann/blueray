<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded=[];

    protected $fillable = [
        'name',
        'client_id',
        'lot_id',
        'manager_id',
        'status_id',
        'adress'
    ];

    public function orders() {
        return $this->hasOne(User::class);
    }

    public function lots() {
        return $this->hasOne(Lot::class);
    }

    public function status() {
        return $this->hasOne(Status::class);
    }

}
