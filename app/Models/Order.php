<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    protected $fillable=[
        'user_id','seller_id','coin_id','quantity','status'
    ];
    public function  coin()
    {
        return $this->belongsTo(Coin::class, 'coin_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');

    }

}
