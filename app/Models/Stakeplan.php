<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stakeplan extends Model
{
    protected $fillable=['stakename','coin_id','duration','payout','investment'];

    public function  coin()
    {
        return $this->belongsTo(Coin::class, 'coin_id', 'id');
    }
    
}
