<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pricetransaction extends Model
{
    protected $fillable=[
        'from_id','from_address','price','coin_id','amount','to_id','to_address'
    ];

    public function  coin()
    {
        return $this->belongsTo(Coin::class, 'coin_id', 'id');
    }   
}

