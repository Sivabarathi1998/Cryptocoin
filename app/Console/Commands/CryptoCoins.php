<?php

namespace App\Console\Commands;

use App\Models\Coin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CryptoCoins extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coin:status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Displaying cryptocoins current status in currencies ';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // return 0;
        $client = new \GuzzleHttp\Client();
  $request = $client->get('https://api.coingecko.com/api/v3/simple/price?ids=bitcoin%2Cethereum%2Ctether%2Csolana%2Ccardano%2Cdogecoin%2Cterra%2Cpolkadot&vs_currencies=usd');
  //$response = $request->getBody()->getContents();

  //$coins = json_decode($response, true);
  //dd($coins);
 // foreach ($coins as $coinid=>$coinvalue){
      //dd($coinid,$coinvalue);
      //$v = new Coin();


       // $v=Coin::where('cryptocoin','=',$coinid)->first();

        //$v-> price = $coinvalue['usd'];

       // $v->save();
     /*  $row=DB::select('select * from coins ');//dd( $row);

       if(!isset($row)){


            $data=Coin::create(['cryptocoin'=>$coinid,'price'=>$coinvalue['usd']]);
       }*/

       $response = $request->getBody()->getContents();
       Log::info('$response');

       Log::info($response);
       // ($response);
       $coins = json_decode($response, true);

        foreach ($coins as $coinid=>$coinvalue){

       //dd($coins);
           $getCoin = Coin::where('cryptocoin', $coinid)->first();
           //dd($getCoin);
           $getCoin->price = $coinvalue['usd'];
         //  dd($getCoin);
           $getCoin->save();



  }




    }
}
