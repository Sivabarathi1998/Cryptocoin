<?php

namespace App\Http\Controllers;

use App\Models\Wallet;
use App\Models\Stakeplan;
use Illuminate\Http\Request;
use App\Models\Stakepurchase;
use Illuminate\Support\Facades\Auth;

class StakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $plans=Stakeplan::all();//dd($plans);

        return view('admin1.stakeindex',compact('plans'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin1.stakecreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'stakename'=>'required',
            'coin_id'=>'required',
            'duration'=>'required',
            'payout'=>'required',
            'mininvest'=>'required'
        ]);

        $data=$request->all();
        $add=$this->storedata($data);

        return redirect('stake')->withsuccess('Stake plan created successfully');
    }
    public function storedata(array $data){
        return Stakeplan::Create([
            'stakename'=>$data['stakename'],
            'coin_id' => $data['coin_id'],
          'duration' => $data['duration'],
          'payout' => $data['payout'],
          'investment' => $data['mininvest'],

        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stake=Stakeplan::find($id);
        // dd($stake);

         return view('admin1.stake_edit',compact('stake'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $stakes = Stakeplan::find($id);

        $request->validate([
            'stakename' => 'required',
            'coin_id' => 'required',
            'duration' => 'required',
            'payout' => 'required',
            'mininvest' => 'required',
        ]);

              $data=$request->all();
        $stakes->update(['stakename'=>$data['stakename'],
        'coin_id' => $data['coin_id'],
      'duration' => $data['duration'],
      'payout' => $data['payout'],
      'investment' => $data['mininvest'],

    ]);

        return redirect('stake') ->with('success','stake plan detail updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stakes = Stakeplan::find($id);
        $stakes->delete();

        return redirect('stake')
                        ->with('success',' Stake plan deleted successfully');
    }

    public function admin(){
        return view('admin1.admindashboard');
    }

    public function stake_plan(){

       $stakeplans= Stakeplan::all();
       return view('admin1.user.stakeplan',compact('stakeplans'));
    }

    // public function stake_add(){

    //    $stakeplans= Stakeplan::all();
    //    return view('admin1.user.user_stakeadd',compact('stakeplans'));

    //  }
     public function stake1_add($id){
        // dd($id);

        $stake= Stakeplan::find($id);
//dd($stake);
        $wallet=Wallet::where('user_id',Auth::user()->id)->where('coin_id',$stake->coin_id)->first();//dd($wallet);
        return view('admin1.user.user_stakeadd',compact('stake','wallet'));

      }
      public function stake_store(Request $request,$min)
      {
//dd($min);
//dd($request);
$wallet=Wallet::where('user_id',Auth::user()->id)->where('coin_id',$request->coinid)->first('totalquantity');//dd($wallet);
$max=$wallet->totalquantity;//dd($max);
$duration=$request->duration;
//dd($duration);

$planpayout=$request->planpayout;

$request->validate([
    'user' => 'required',
    'stakeplan' => 'required',
    'tenuredate' => 'required',
    'invest_quantity' => 'required|numeric|min:'.$min.'|max:'.$max,
]);
$data=$request->all();

$data['payoutamount']=($data['invest_quantity']) + (($planpayout/100)*$data['invest_quantity']);
$data['payout_permonth']=(($planpayout/100)*$data['invest_quantity'])/($duration);
$data['payout_perday']=floatval((($planpayout/100)*$data['invest_quantity'])/($duration))/(30);
$per_hour=floatval((($planpayout/100)*$data['invest_quantity'])/($duration))/(30);
$data['payout_perhour']=floatval($per_hour/720);
$per_min=$per_hour/720;
$data['payout_perminute']=floatval($per_min/60);






//dd($data['invest_quantity']);

// dd($data['payout']);
$stake=StakePlan::where('stakename',$data['stakeplan'])->first();
Wallet::where('user_id',Auth::user()->id)->where('coin_id',$stake->coin_id)->decrement('totalquantity',$data['invest_quantity']);
$data['user_id']=Auth::user()->id;

$check=$this->datastore($data);

return redirect('stake-plan')->with('message','Stake Plan Added Successfully');



      }

public function datastore(array $data){
        Stakepurchase::create($data);
}

public function user_stakehistory(){

    $stakepurchases=Stakepurchase::where('user_id',Auth::user()->id)->get();
    return view('admin1.user.user_stakehistory',compact('stakepurchases'));
}
public function admin_stakepurchase(){

    $stakepurchases=Stakepurchase::all();
    return view('admin1.stakepurchase',compact('stakepurchases'));

}


}
