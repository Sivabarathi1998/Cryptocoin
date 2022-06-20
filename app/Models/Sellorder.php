<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sellorder extends Model
{
    protected $fillable=[
        'quantity','user_id','coin_id'
    ];

    public function  coin()
    {
        return $this->belongsTo(Coin::class, 'coin_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');

    }
}
