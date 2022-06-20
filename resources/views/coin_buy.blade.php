@extends('layout')
@section('content')
<style>

    .card
    {
        /* padding: 55px; */
        border-radius: 50px;
        box-shadow: 5px 5px 10px #ad8ed6;
        width: 70%;
        margin-top: 30px;
        background-color: black!important;
    }
    h2{
        margin-left: 210px;
        color:wheat;
        margin-top: 5px;

    }
    .form-control{
    width: 70%!important;
}
   strong{
       margin-left: 110px;
       color:wheat;
       font-size: 17px;
   }
   .submit{
    margin-left:250px;
    margin-top:30px;
    height:40px;
    color:white;
    background-color:green;
    font-size: 14px;
    border-radius:8px;
   }
</style>
    {{-- <div class="row">

        <div class="col-lg-12 margin-tb">

            <div class="pull-left">

                <h2>Select Coin</h2>

            </div>


    </div>

    <br>
    <a class="btn btn-primary" href="{{route('welcome')}}" style="margin-left: 1250px;"> Back</a>


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
    <div class="col-md-6 offset-md-3">
        <div class="card" style="margin-left: 73px;">
            <form action=""  method="POST" >
                @csrf


                    <div class="col-md-12">
                    <div class="form-group">
                        <strong> Name:</strong>
                        <input type="text" name="name" value="" class="form-control">
                    </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <strong> Select Coin:</strong>
                            <select name="role" class="form-control" style="width:55%;float:right;">
                                <option value=""></option>


                                <option value=""></option>
                            </select>                        </div>
                        </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <button type="reset" value="Reset" class="btn btn-warning" style="color:white;">Reset</button>
                    </div>


            </form>
        </div>
    </div>
</div> --}}

<div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">

            <form action="{{route('purchase.insert')}}" method="POST" enctype="multipart/form-data">
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
                            <h2> Purchase Coins</h2>
                        </div>
                    </div>
                </div>
                <a class="btn btn-primary" href="{{route('welcome')}}" style="margin-left: 900px;"> Back</a>

                <div class="row">

                            <div class="col-sm-6">
                                <Strong>User:</Strong>
                            </div>
                            <div class="col-sm-6">

                                <select name="user" id="name" class="form-control">
                                    <option value="{{Auth::user()->id}}">{{Auth::user()->name}}</option>

                                  </select>
                        </div>
                    </div>
                      <br>

                    <div class="row">

                                <div class="col-sm-6">
                                    <Strong>Quantity:</Strong >
                                </div>
                                <div class="col-sm-6">
                                    <input type="text" name="quantity" id="quantity" class="form-control"placeholder="0.0"  >



                            </div>
                    </div>
                    <br>

                        <div class="row">

                                    <div class="col-sm-6">
                                        <strong>Coin:</strong>
                                    </div>
                                    <div class="col-sm-6">

                                        <select name="coin" id="coins" class="form-control" >
                                            <option value="">Select Coin</option>
                                           @foreach(App\Models\Coin::all() as $price)
                                            <option value="{{$price->id}}">{{$price->cryptocoin}}</option>
                                            @endforeach
                                          </select>
                                </div>
                        </div><br>
                            <div class="row">

                                        <div class="col-sm-6">
                                            <strong >Price:</strong>
                                        </div>
                                        <div class="col-sm-6">


                                                {{-- @if (($inputs)!=0) --}}


                                                    {{-- @if(($array)!=0) --}}

                                                    <input type="text" name="totalprice" id="totalprice" class="form-control"placeholder="0.0" value="" readonly>

                                                    {{-- @endif
                                                @endif --}}

                                    </div>
                                </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 form-group">
                        <div class="">
                            <div class="col-sm-9">
                            <button class="submit" type="submit" id="submit"   >Submit</button>

                        </div>

                        </div>
                    </div>

            </div>

            </form>
            {{-- Form End --}}
        </div>
    </div>
  </div>
  <div class="col-xs-12 col-sm-12 col-md-12 form-group">
    <div class="">
        <div class="col-sm-9">
        {{-- <a class="btn btn-primary" href="{{ url('dashboard') }}" style="margin-left: 900px;"> Back</a> --}}
        </div>
    </div>
</div>
{{-- <script>
       function getPrice(id) {
           var price=document.getElementById("coins").value;
        window.location.href = '/price/' + price + '/filter';
    }
</script>
<script>
       function getquantity(input) {
        var inputVal = document.getElementById("quantity").value;
        window.location.href = '/price/' + inputVal + '/filter';
    }
</script> --}}
{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> --}}
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script>
 $(document).ready(function(){
//   $("#quantity").change(function(){
    // $('#quantity').on('keyup',function(){
    //  $("#quantity").click(function(event){
        $('#coins').change(function(){

      var value=$('#quantity').val();
      var coin=$('#coins').val();
      $.ajax({
            type : 'post',
           // url : '{{URL::to('search')}}',
             url:'{{route('totalprice')}}',
             data:{'_token' : '{{ csrf_token() }}',
                 'quantity': value,
                  'coin':coin,

                 },

                success:function(data){//dd(data);
                    $("#totalprice").val(data);
                }
            });

    // data:{'_token' : '{{ csrf_token() }}', 'search': value},
  });
 });
  </script>




@endsection
