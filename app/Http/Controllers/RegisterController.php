<?php

namespace App\Http\Controllers;

use Session;
use App\Models\Coin;
use App\Models\User;
use App\Models\Order;
use App\Models\Wallet;
use App\Models\Purchase;
use App\Models\Sellorder;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Pricetransaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class RegisterController extends Controller
{
    public function log()
    {

        if(Auth::check()){
                              // dd(Auth::check()) It returns true or false
            return redirect('home');
        //     $coins=Coin::paginate(4);//dd($coins);
        //    return view('welcome',compact('coins'));

        }
        return view('auth.login');
    }
    public function customLogin(Request $request)
    {
        //dd($request);
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');//dd( $credentials);
        if (Auth::attempt($credentials)) {
           // $users=User::where('email',$request->email)->get();//dd($users);


           return redirect('home');

        }
        // dd("Invalid");
        return redirect("login")->with(['error' => 'Login details are not valid']);

    }
    public function signOut() {
        Session::flush();
        Auth::logout();

        return Redirect('login');
    }

    public function registration()
    {
        return view('auth.registration');
    }
    public function customRegistration(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:10',
            'image'=>'required',
        ]);
        $imagename=$request->name.".".$request->image->extension();
        $path=$request->file('image')->storeAS('users',$imagename);

        $data = $request->all();
        //$check = $this->create($data);
        // User::create([ 'username' => $data['name'],
        //  'email' => $data['email'],
        //  'password' => Hash::make($data['password'])]);
        $data['image']=$path;
        $check=$this->creates($data);
       return view('auth.login')->with('message' , 'Registered Successfully');
       //return redirect()->route('login')->with('success',' Registered Successfully');

        //  return redirect("login")->with(['success' => 'Registered Successfully']);


    }
    public function creates(array $data)
    {
        $data['password']=Hash::make($data['password']);
        $randomstring = Str::random(30);
       // 'address'=>$data['address']
       $user=new User;
       $user->name=$data['name'];
       $user->email=$data['email'];
       $user->password=$data['password'];
       $user->image=$data['image'];
       $user->address=$randomstring;
       $user->save();
       // return User::create($data);
    }
    public function profileshow(){
        // $data=Auth::user(); dd($data); both Auth correct

       $email=Auth()->user()->email;
        $users=User::where('email',$email)->get();
        return view('profile.profile',compact('users'));
    }
   public function profile_edit()
   {
    return view('profile.profile_edit');

   }
   public function profile_update(Request $request)
    {

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
             'image'=>'required',
        ]);
        $imagename=$request->name.".".$request->image->extension();
        $path=$request->file('image')->storeAS('users',$imagename);

        $data = $request->all();

        $data['image']=$path;
        $check=Auth::user()->update($data);
    //    return redirect()->back()->with(['success' => 'Updated Successfully']);
    return view('profile.profile')->with(['success' => 'Updated Successfully']);

    }

    public function coin_display(){
        $coins=Coin::paginate(10);
        return view('coin_display',compact('coins'));
    }

    public function cal(Request $request)

    { //dd($request);
    if($request->ajax())
    {
    $output="";

   //$employees=Employee::where('name','LIKE','%'.$request->search."%")->get();//dd( $employees);
  // 1 $employees = Employee::where('name','LIKE','%'.$request->search."%")->orwhereHas('rolename', function($q) use($request) {

    //    $q->where('role','LIKE','%'.$request->search."%");

    //})->get();
    $data=  Coin::where('id','LIKE','%'.$request->coin."%")->get('price');//dd($data);//output will be object with many properties
    //dd($data[0]->price);
    $quan=$request->quantity;//dd($quan);
     $output=$quan*$data[0]->price;//dd($output);

  return Response($output);

}


}
public function purchase_insert(Request $request)
{
    $request->validate([
        'user' => 'required',
        'quantity' => 'required',
         'coin'=>'required',
         'totalprice'=>'required',

    ]);
    $data = $request->all();

    Purchase::create([ 'user_id' => $data['user'],
         'quantity' => $data['quantity'],
          'coin_id' => $data['coin'],
          'totalprice' => $data['totalprice'],

        ]);
      //  return view('coin_buy')->with(['success' => 'Purchase Done Successfully']);
      $wallet=$this->add($data);
        return redirect('coin-buy')->with(['success' => 'Purchase Done Successfully']);


}
     public function add(array $data){
  /* Wallet total quantity should not be calculated  from transaction table
    $row = Wallet::where('coin_id',$data['coin'])->first(); //dd($row);

    if($row==null){
        $coindata=Purchase::where('user_id',Auth()->user()->id )->groupBy('coin_id')->select('coin_id',DB::raw('SUM(quantity) as totalcoin'))->where('coin_id',$data['coin'])->first();
        // dd($coindata);
          Wallet::Create(['user_id'=>Auth()->user()->id,
            'coin_id'=>$data['coin'],
            'totalquantity'=>$coindata->totalcoin,
          ]);

    }
else{
    $coindata=Purchase::where('user_id',Auth()->user()->id )->groupBy('coin_id')->select('coin_id',DB::raw('SUM(quantity) as totalcoin'))->where('coin_id',$data['coin'])->first();

    Wallet::where("coin_id", $data['coin'])->update(['totalquantity'=>$coindata->totalcoin]);
}*/
     // $coindata=Purchase::where('user_id',Auth()->user()->id )->groupBy('coin_id')->select('coin_id',DB::raw('SUM(quantity) as totalcoin'))->where('coin_id',$data['coin'])->first();
     // dd($coindata);

    //Both $row and firstorCreate method works
    //updateorCreate method Contains two array

 /* $row= Wallet::where('user_id',Auth::user()->id)->where('coin_id',$data['coin'])->first();
   if($row==null)
   {
    Wallet::Create(['user_id'=>Auth()->user()->id,
    'coin_id'=>$data['coin'],
    'totalquantity'=>$data['quantity'],
  ]);
   }
   else
   {
   // $res=$row->totalquantity+$data['quantity'];//dd($res);
    //Wallet::where('user_id',Auth::user()->id)->where('coin_id',$data['coin'])->update([ 'totalquantity'=>$res,]);
     Wallet::where('user_id',Auth::user()->id)->where('coin_id',$data['coin'])->increment('totalquantity',$data['quantity']);
   }
  */
  // $res=$user->totalquantity+$data['quantity'];//dd($res);
      $wallet = Wallet::firstOrCreate(['coin_id'=>$data['coin'], 'user_id'=>Auth()->user()->id]);//dd($wallet->totalquantity);
      //dd($wallet);
      $wallet->totalquantity = $wallet->totalquantity + $data['quantity'];
      $wallet->save();
          //updateorCreate method Contains two array

    // Wallet::updateOrCreate(['coin_id'=>$data['coin'],'user_id'=>Auth()->user()->id],['user_id'=>Auth()->user()->id,
    //   'coin_id'=>$data['coin'],
    //   'totalquantity'=>$coindata->totalcoin,
    //    'totalquantity'=>$wallets,
    //    'totalquantity'=>$user->totalquantity+$data['quantity'],
    // ]);
    }
public function purchase_details()
{
    //  $purchases=Purchase::paginate(4);
    //  return view('purchase_details',compact('purchases'));
    $purchases=Purchase::where('user_id',Auth()->user()->id)->get();//dd($purchases);
    return view('purchase_details',compact('purchases'));
}

public function usercoin(){

/*$datas=Purchase::where('user_id', Auth::user()->id)
->groupBy('coin_id')
->select( 'coin_id', DB::raw('SUM(quantity) as total'))
->get();*/
$datas=Wallet::where('user_id', Auth::user()->id)->get();
    return view('dashboard',compact('datas'));
}

public function demo(){

//correct
/*$datas = DB::table('purchases')->select(DB::raw('count(*) as total,coin_id'))
// ->select(DB::raw('count(coin_id)'))
->where('user_id',Auth()->user()->id )
->groupBy('coin_id')
->get();


/*$datas = Purchase::select(DB::raw('sum(quantity) as total'))->join('coins','coins.id','=','purchases.coin_id')->where('user_id',Auth()->user()->id )
->groupBy('coin_id')
->get();//dd($datas);*/
$datas=Purchase::where('user_id', Auth::user()->id)
->groupBy('coin_id')
->select( 'coin_id', DB::raw('SUM(quantity) as total'))

->get();


    //dd($datas);

return view('dashboard',compact('datas'));

}

public function coin_buyorder(){

    // $users=User::where('id','NOT LIKE','%'.Auth::user()->id.'%')->order->get();
    // $users=User::find(2)->order;
  //  $users=User::where('id','NOT LIKE','%'.Auth::user()->id.'%')->get()->order;
   //  $users=Sellorder::where('user_id','NOT LIKE','%'.Auth::user()->id.'%')->get();
       //$users=Purchase::where('user_id','NOT LIKE','%'.Auth::user()->id.'%')->groupBy('coin_id')->select('coin_id','user_id')
//->get();
   $users=Order::where('user_id','NOT LIKE','%'.Auth::user()->id.'%')->where('status','=','sell')->get();
    return view('coin_buyorder',compact('users'));
}
public function coin_sellorder(){

//     $coins=Purchase::where('user_id', Auth::user()->id)
// ->groupBy('coin_id')
// ->select( 'coin_id','totalprice', DB::raw('SUM(quantity) as total'))
// ->get();

$coins=Wallet::where('user_id',Auth::user()->id)->get();

    return view('coin_sellorder',compact('coins'));

}

public function coin_sellorderinsert(Request $request)
{
// dd($request);
 if($request->ajax())
    {

        $request->validate([
            'coin_id' => 'required',
            'quantity' => 'required',

        ]);

        $available_quantity=Wallet::where('coin_id',$request->coin_id)->first('totalquantity');//dd($available_quantity);
        if($request->quantity > $available_quantity->totalquantity)
        {
            //return view('coin_sellorder'),with
           // return view('coin_sellorder')->with('message', 'greater');
           return response()->json(['status'=>'error','msg' => 'Selling Quantity Greater than Available Quantity']);

        }
      //  $output="Selling Quantity added successfully";

    }
   // return Response($output);
  // Sellorder::create(['user_id'=>Auth::user()->id,'coin_id'=>$request->coin_id,'quantity'=>$request->quantity]);
  Order::create(['user_id'=>Auth::user()->id,'coin_id'=>$request->coin_id,'quantity'=>$request->quantity,'status'=>'Sell']);
   return response()->json(['status'=>'success','msg' => 'Selling Quantity Added Successfully']);

}



  public function coin_buyorderinsert(Request $request)
{
// dd($request);
 if($request->ajax())
    {

        $request->validate([

            'coin_id' => 'required',
            'quantity' => 'required',

        ]);

        $selling_quantity=Order::where('coin_id',$request->coin_id)->where('user_id',$request->sell_id)->first('quantity');//dd($available_quantity);
        if($request->quantity > $selling_quantity->quantity)
        {
           return response()->json(['status'=>'error','msg' => 'Buying Quantity Greater than Selling Quantity']);

        }

    }
   // return Response($output);
  // Sellorder::create(['user_id'=>Auth::user()->id,'coin_id'=>$request->coin_id,'quantity'=>$request->quantity]);
  Order::create(['user_id'=>Auth::user()->id,'seller_id'=>$request->sell_id,'coin_id'=>$request->coin_id,'quantity'=>$request->quantity,'status'=>'Purchased']);
   return response()->json(['status'=>'success','msg' => 'Coin Purchased Successfully']);

}

public function sendcoin()
{
   // $randomString = Str::random(30);
    //dd($randomString);
    $coins=Wallet::where('user_id',Auth::user()->id)->get();

    return view('coin.sendcoin',compact('coins'));//,['randomString'=>$randomString]);
}

public function sendcoin_insert(Request $request)
{ //dd($request);
      $request->validate([
           'address'=>'required',
           'coin_id'=>'required',
           'amount'=>'required'

      ]);

     $address= User::where('address',$request->address)->first();//dd($address);
    $coin=Wallet::where('user_id',Auth::user()->id)->where('coin_id',$request->coin_id)->first('totalquantity');
   // dd($coin);
     if($address)
     {
         if($request->amount>$coin->totalquantity)
         {
            return redirect()->route('sendcoin')->with('error','Amount Sent is greater than available quantity');

         }
         else
         {

         Pricetransaction::create(
             ['from_id'=>Auth::user()->id,
               'from_address'=>Auth::user()->address,
               'coin_id'=>$request->coin_id,
               'amount'=>$request->amount,
               'to_id'=>$address->id,
               'to_address'=>$request->address,


        ]);
        Wallet::where('user_id',Auth::user()->id)->where('coin_id',$request->coin_id)->decrement('totalquantity',$request->amount);

      //1.both firstorCreate and updateorCreate method works 2.total quantity is int type column in database so default value null is assigned to 0 while creating new record if totalquantity value is not provided
       $wallet = Wallet::firstOrCreate(['coin_id'=>$request->coin_id, 'user_id'=>$address->id]);//dd($wallet->totalquantity);
       // dd($wallet);
        $wallet->totalquantity = $wallet->totalquantity + $request->amount;
        $wallet->save();

  /*  $wallet = Wallet::updateOrCreate(['coin_id'=>$request->coin_id, 'user_id'=>$address->id],);//dd($wallet->totalquantity);
      $wallet->totalquantity = $wallet->totalquantity + $request->amount;
      $wallet->save();*/

      return redirect()->route('sendcoin')->with('success','Amount Sent successfully');
        }
     }
     else{
        // return 'invalid user';
         return redirect()->route('sendcoin')->with('error','invalid user');

     }

}

public function receivecoin()
{
            $data=User::where('id',Auth::user()->id)->first();//dd($data);
            $qrcode = QrCode::size(200)->generate($data->address);

   return view('coin.receivecoin',compact('qrcode'));
}

public function sendcoin_history()
{
   $sendcoins=Pricetransaction::where('from_id',Auth::user()->id)->paginate(10);
   return view('coin.send_history',compact('sendcoins'));
}




}

