
@extends('layout')
@section('content')
<style>
    .card_box
    {
        /* background:rgba(1,1,1,0.1); */
        border-radius: 20px;
        padding: 25px;
        box-shadow: 5px 5px 5px 5px black;
        margin-bottom: 200px;

    }
</style>


<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
        <div class="">
            <div class="col-sm-9">
                <a class="btn btn-primary" href="{{route('stake.plan')}}" style="margin-left: 1290px;"> Back</a>
            </div>
        </div>
    </div>
    <div class="col-md-6 offset-md-3">
        <div class="card_box">


            <form action="{{route('stake.insert',$stake->investment)}}" method="POST">
                @csrf

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>Rules & Requirements:</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                        <div class="">
                            <div class="col-sm-3">
                                <input type="hidden" name="user" id="user" class="form-control" value=" {{Auth()->user()->id}}"/>

                            </div>
                            <div class="col-sm-9">


                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <div class="">
                                <div class="col-sm-3">

                                        <input type="hidden" name="stakeplan" id="stakeplan" class="form-control" value=" {{$stake->stakename}}"/>
                                        <input type="hidden" name="coinid"  class="form-control" value=" {{$stake->coin_id}}"/>


                                </div>

                        </div>



                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <div class="">
                                <div class="col-sm-3">
                                    <label style="font-size: 20px;">Min Coin Required: <ul>
                                        <li>{{$stake->investment}} Coins</li>
                                    </ul></label >
                                </div>

                        </div>
                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <div class="">
                                    <div class="col-sm-3">






                                                <input type="hidden" name="totalcoin" id="totalcoin" value="{{$wallet->totalquantity}}">





                                        </ul></label >
                                    </div>
                                    <div class="col-sm-9">




                                </div>
                            </div>




                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <div class="">
                                    <div class="col-sm-3">



                                        <input type="hidden" name="tenuredate" id="tenuredate" class="form-control" value=" {{\Carbon\Carbon::now()->addMonth($stake->duration)}}"/>
                                    </div>

                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="">
                                        <div class="col-sm-3">



                                            <input type="hidden" name="payout_per_minute" id="payout_per_min" class="form-control" value=""/>
                                        </div>

                                </div>
                                <div class="row">

                                    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                        <div class="">
                                            <div class="col-sm-3">



                                                <input type="hidden" name="payout_per_hour" id="payout_per_hour" class="form-control" value=""/>
                                            </div>

                                    </div>
                                    <div class="row">

                                        <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                            <div class="">
                                                <div class="col-sm-3">



                                                    <input type="hidden" name="payout_per_day" id="payout_per_day" class="form-control" value=""/>
                                                </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                                <div class="">
                                                    <div class="col-sm-3">



                                                        <input type="hidden" name="payout_per_month" id="payout_per_month" class="form-control" value=""/>
                                                    </div>

                                            </div>
                                            <div class="row">

                                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                                    <div class="">
                                                        <div class="col-sm-3">



                                                            <input type="hidden" name="duration" id="duration" class="form-control" value="{{$stake->duration}}"/>
                                                        </div>

                                                </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="">
                                        <div class="col-sm-3">



                                            <input type="hidden" name="planpayout" id="planpayout" class="form-control" value="{{$stake->payout}} "/>
                                        </div>

                                </div>

                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="">
                                        <div class="col-sm-3">



                                            <input type="hidden" name="payoutamount" id="payoutamount" class="form-control" />
                                        </div>

                                </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="">
                                        @if($wallet->totalquantity != null)
                                        @if ($wallet->totalquantity > $stake->investment)


                                        <div class="col-sm-3">
                                            <label style="font-size: 20px;">Investing Quantity:</label >
                                        </div>
                                        <div class="col-sm-9">

                                            <input type="number" name="invest_quantity" id="invest_quantity"     class="form-control" >






                                    </div>
                                </div><br>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="">
                                        <div class="col-sm-3">

                                        </div>
                                        <div class="col-sm-9">

                                                 <p>   <input type="checkbox" name="checked" id="checked"  value="checked"  readonly>





                                                   I agree to the terms and conditions</p>




                                    </div>
                                </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                        <div class="">
                            <div class="col-sm-9">

                                     <button type="submit" id="submit" class="btn-success" style="color:black;margin-left:180px;margin-top:10px;height:40px;" >Place Stake</button>

                        </div>

                        </div>
                    </div>
                    @else

                    <script>window.alert("you  have less coins for this stake your wallet")</script>
                    <p style="color:black;font-size:20px;">You  have only {{$wallet->totalquantity}}   Coin ,as you  don't have enough coins in your wallet you can't stake. Please purchase  coin required for this stake  or choose less investment stake plan</p>


                    <p style="color:red;font-size:25px;"> Can't Stake Now!!</p>
                    @endif
                    @endif


            </div>
        </div>
    </div>
  </div>



</form>
<script>
    /*function check(value){
        //var x = document.getElementById("invest_quantity").value;

        window.location.href = "{{url('quantity_check')}}" + "/" + value;

    }*/

</script>


@endsection




