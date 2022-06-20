<?php

namespace App\Http\Controllers;

use App\Models\Coin;
use App\Models\Wallet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Swapcontroller extends Controller
{

  public function swapcoin()
      {
       $datas=Wallet::where('user_id',Auth::user()->id)->get();
       return view('swap',compact('datas'));
      }

public function swapvalue(Request $request, $type){

    $from_coin =  Coin::where('id',$request->from_id)->first();
         $to_coin =  Coin::where('id',$request->to_id)->first();
        if($request->ajax()){
            if($type == "from" && $request->fromquantity!=null){
                $to_price = $from_coin->price * $request->fromquantity / $to_coin->price;
                return response(['from_price' => $request->fromquantity, 'to_price' => $to_price]);
            }elseif($type == "to" && $request->toquantity!=null){
                $from_price = $to_coin->price * $request->toquantity / $from_coin->price;
                return response(['from_price' => $from_price, 'to_price' => $request->toquantity]);
            }




     //  if($request->toquantity!=null && $type="to" && $request->fromquantity!=null){
                 elseif($request->fromquantity!=null  &&  ($type=="from"||$type=="to") && $request->from_id!=null && $request->to_id!=null  ){
            $from_quantity = $request->fromquantity;
            $to_coin =  Coin::where('id',$request->to_id)->first();
            $to_price = $from_coin->price * $from_quantity / $to_coin->price;
                            return response(['from_price' => $request->fromquantity, 'to_price' => $to_price]);

         }
//else if($request->fromquantity!=null && $type="from" && $request->toquantity!=null){
            elseif($request->toquantity!=null  && ($type=="to"||$type=="from") && $request->to_id!=null && $request->from_id!=null){
            $to_quantity = $request->toquantity;
            $from_coin =  Coin::where('id',$request->from_id)->first();
            $from_price = $to_coin->price * $to_quantity / $from_coin->price;
                            return response(['from_price' => $from_price, 'to_price' => $request->toquantity]);

         }

/* if($request->ajax()){
    if($type == "from" && $request->fromquantity!=null){
        $to_price = $from_coin->price * $request->fromquantity / $to_coin->price;
        return response(['from_price' => $request->fromquantity, 'to_price' => $to_price]);
    }elseif($type == "to" && $request->toquantity!=null){
        $from_price = $to_coin->price * $request->toquantity / $from_coin->price;
        return response(['from_price' => $from_price, 'to_price' => $request->toquantity]);
    }

//     elseif($request->fromquantity==null  &&  ($type=="from"||$type=="to") && $request->from_id!=null && $request->to_id!=null  )
// {
//     return response(['from_price' => null, 'to_price' => null]);
// }
// elseif($request->toquantity==null  &&  ($type=="from"||$type=="to") && $request->from_id!=null && $request->to_id!=null  )
// {
//     return response(['from_price' => null, 'to_price' => null]);
// }

        elseif(($request->fromquantity!=null||$request->fromquantity==null)  &&  ($type=="from"||$type=="to") && $request->from_id!=null && $request->to_id!=null  ){


            $from_quantity = $request->fromquantity;
           $to_coin =  Coin::where('id',$request->to_id)->first();
           $to_price = $from_coin->price * $from_quantity / $to_coin->price;

           if($request->fromquantity!=null)
{
           return response(['from_price' => $request->fromquantity, 'to_price' => $to_price]);}
           elseif($request->fromquantity==null){
            return response(['from_price' => null, 'to_price' => null]);

           }

 }
//else if($request->fromquantity!=null && $type="from" && $request->toquantity!=null){
    elseif(($request->toquantity!=null||$request->toquantity==null)  && ($type=="to"||$type=="from") && $request->to_id!=null && $request->from_id!=null){
    $to_quantity = $request->toquantity;
    $from_coin =  Coin::where('id',$request->from_id)->first();
    $from_price = $to_coin->price * $to_quantity / $from_coin->price;
    if($request->toquantity!=null)
{
    return response(['from_price' => $from_price, 'to_price' => $request->toquantity]);}

    elseif($request->toquantity==null){
        return response(['from_price' => null, 'to_price' => null]);

       }
}

         } */

        }


    }


}
