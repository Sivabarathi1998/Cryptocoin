@extends('layout')
@section('content')
<style>
.table-bordered th,td{
    border:2px solid green;
    text-align: center;
    font-size: 17px;

}
.table{
    width:80%!important;
    margin-left: 170px;
}
.table-bordered td{
    text-align: center;
    border:2px solid green;

}
</style>

<a class="btn btn-primary" href="{{route('welcome')}}" style="margin-left: 1300px;"> Back</a>

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">
            <br><br>
            {{-- <h2 style="margin-left:600px;">Your Transactions</h2> --}}
            @if(session()->has('message'))
            <div class="alert alert-danger">
                {{ session()->get('message') }}
            </div>
        @endif
        </div>


    </div>

</div>




<br>
<table class="table table-bordered">

    <tr>

        <th  width="5%">S.No</th>

        <th  width="15%">Coin</th>
        <th  width="15%">Available Quantity </th>
        {{-- <th  width="15%">Purchased Price(per coin) </th> --}}

        <th  width="15%"> Selling Price(per coin) </th>
        <th  width="15%"> Selling Quantity  </th>
        <th  width="15%"> Action  </th>
</tr>




      @foreach ($coins as $key=> $coin)

    <tr>

           <td >{{++$key }}</td>
           {{-- <td><form action="{{route('sellstore')}}" method="post"> @csrf<input type="text"  name="coin" class="form-control" value="{{$userdata->purchases->coin}} " readonly ></td>
            <input type="text" id="sellingquantity" name="Quantitychoosed" class="form-control" style="width: 20%;" ><button  id="buy" >SELL</button></form></td> --}}
         <td id="coins" value="{{$coin->coin_id}}" >{{$coin->coin->cryptocoin  }}</td>
         {{-- <td id="coins" value="{{$coin->coin_id}}" ><form action="#" method="post">@csrf<input type="text"  name="coin" class="form-control" value="{{$coin->coin->cryptocoin }} " readonly ></td> --}}
         <td >{{$coin->totalquantity  }}</td>
         {{-- <td >${{($coin->totalprice)/($coin->total) }}</td> --}}
         <td >${{$coin->coin->price  }}</td>
        {{-- <td ><form action="{{route('coin.sellorderinsert')}}" method="post"><input type="hidden"  id="coin_{{$key}}" class="form-control" value="{{$coin->coin_id}} "  >
            @csrf<input type="number" id="quantity" max="{{$coin->total}}" name ="quantity"class="form-control"></td>--}}
            <td ><input type="hidden"  id="coin_{{$key}}" class="form-control" value="{{$coin->coin_id}} "  >
             <input type="text" id="quantity_{{$key}}" max="{{$coin->total}}" class="form-control" ></td>
            <td ><button type="button" class="bg-success" onclick="sellorder({{$key}})">SELL</button></td>

 </tr>

    @endforeach


</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function sellorder(index){



      var coin_id=$('#coin_'+index).val();
      var quantity=$('#quantity_'+index).val();
      $.ajax({
            type : 'post',
           // url : '{{URL::to('search')}}',
             url:'{{route('coin.sellorderinsert')}}',
             data:{'_token' : '{{ csrf_token() }}',
                 'coin_id': coin_id,
                  'quantity':quantity,

                 },

                success:function(data)
                {//dd(data);
                    //$("#totalprice").val(data);
                   // alert(data);
                   json_obj = data;
                 /*  alert(json_obj.msg);

                   //alert(JSON.stringify(json_obj));

                  // console.log(data);
                },
                error: function (error)
                 {
                 console.log(error);
                  }*/
                  if(json_obj.status=="success")
                  {
                      alert(json_obj.msg);
                  }
                  else{
                      alert(json_obj.msg);
                  }
                }
            });

    // data:{'_token' : '{{ csrf_token() }}', 'search': value},
    }
  </script>




@endsection
