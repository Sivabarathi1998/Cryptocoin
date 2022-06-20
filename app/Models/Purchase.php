<?php

namespace App\Models;

use App\Models\Coin;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Purchase extends Model
{
    protected $table='purchases';
    protected $fillable=[
        'quantity','user_id','coin_id','totalprice'
    ];

    /**
     * Get the  username te Purchase
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function  coin()
    {
        return $this->belongsTo(Coin::class, 'coin_id', 'id');
    }
    public function user(){
        return $this->belongsTo(User::class, 'user_id', 'id');

    }
}
