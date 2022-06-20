<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stakepurchase extends Model
{
    protected $fillable=[
        'user_id','stakeplan_id','tenuredate','invest_quantity','payoutamount','payout_perminute','payout_perhour','payout_perday','payout_permonth'
    ];
}
