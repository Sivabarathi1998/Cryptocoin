<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{

    protected $table='wallets';
protected $fillable=['user_id','coin_id','totalquantity',];

public function  coin()
    {
        return $this->belongsTo(Coin::class, 'coin_id', 'id');
    }

}

