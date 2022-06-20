
@extends('admin1.adminlayout')
@section('content')
<style>
    .card_box
    {
        /* background:rgba(1,1,1,0.1); */
        border-radius: 20px;
        padding: 25px;
        box-shadow: 5px 5px 5px 5px black;

    }
.sub
{
    color:white;
    background-color:green;
    margin-left:180px;
    margin-top:30px;
    height:40px;
    border-radius: 5px;

}


</style>



<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
        <div class="">
            <a class="btn btn-primary" style="margin-left:1200px;" href="{{ route('stake.index') }}">Back</a><br>
        </div>
    </div>
    <div class="col-md-6 offset-md-3">
        <div class="card_box">


            <form action="{{ route('stake.update',$stake->id) }}" method="POST">
                @csrf
                @method('PUT')

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
            @if(session()->has('message'))
            <div class="alert alert-success">
                {{ session()->get('message') }}
            </div>
        @endif

                <div class="row">
                    <div class="col-lg-12 margin-tb">
                        <div class="pull-left">
                            <h2>  Edit Stake Plans</h2>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                        <div class="">
                            <div class="col-sm-3">
                                <label> Stake Name:</label>
                            </div>
                            <div class="col-sm-9">

                                <input type="text" name="stakename" id="stakename"  value="{{$stake->stakename}}"  class="form-control" placeholder="enter stake name">
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <div class="">
                                <div class="col-sm-3">
                                    <label>Stake Coin:</label >
                                </div>
                                <div class="col-sm-9">
                                    <select name="coin_id" id="coin_id" class="form-control" aria-placeholder="Choose Coin" >
                                        <option value="{{$stake->id}}">{{$stake->coin->cryptocoin}}</option>
                                        @foreach(\App\Models\Coin::all() as $stakedata)
                                         <option value="{{$stakedata->id}}">{{$stakedata->cryptocoin}}</option>
                                         @endforeach
                                       </select>


                            </div>
                        </div>


                    <div class="row">

                        <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                            <div class="">
                                <div class="col-sm-3">
                                    <label>Duration(in Months):</label >
                                </div>
                                <div class="col-sm-9">
                                    <input type="text" name="duration" value="{{$stake->duration}}" id="duration" class="form-control"placeholder="0"  >



                            </div>
                        </div>


                        <div class="row">

                            <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                <div class="">
                                    <div class="col-sm-3">
                                        <label>Payout(%):</label>
                                    </div>
                                    <div class="col-sm-9">

                                       <input type="text" name="payout" value="{{$stake->payout}}"  id="payout" placeholder="payout in %" class="form-control">
                                </div>
                            </div>
                            <div class="row">

                                <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                                    <div class="">
                                        <div class="col-sm-3">
                                            <label >Min Investment(in Coins):</label>
                                        </div>
                                        <div class="col-sm-9">






                                                    <input type="number" name="mininvest"  value="{{$stake->investment}}" id="min" class="form-control">




                                    </div>
                                </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                        <div class="">
                            <div class="col-sm-9">
                            <button type="submit" id="submit"  class="sub" >Submit</button>

                        </div>

                        </div>
                    </div>


            </div>
        </div>
    </div>
  </div>



</form>


@endsection

