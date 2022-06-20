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

{{-- <select name="user" id="name" class="form-control">
    @foreach ($users as $user)

    <option value="{{$user->id}}">{{$user->name}}</option>
    @endforeach

  </select> --}}
  <a class="btn btn-primary" href="{{route('welcome')}}" style="margin-left: 1500px;"> Back</a>

  <table class="table table-bordered">

    <tr>
        <th  width="5%">User</th>

        <th  width="5%">Cryptocoin</th>

        {{-- <th  width="15%">Symbol</th> --}}



        <th  width="5%">Selling Quantity</th>
        <th   width="5%">Buying Quantity   </th>
        {{-- <th  width="15%">Selling Price(PerCoin) </th> --}}
        <th  width="5%">Action</th>



    </tr>
    {{-- @php
    $i = 1
    @endphp --}}



     {{-- @foreach ($coins as $coin) --}}
     @foreach ($users as $key=>$user)
    <tr>

           <td ><input type="hidden" value="{{$user->user->id}}" id="user_{{$key}}">{{$user->user->name }}</td>

         <td>{{$user->coin->cryptocoin }}</td>
          <td>{{$user->quantity}}</td>
         <td ><input type="hidden" value="{{$user->coin_id}}" id="coin_{{$key}}"><input type="text" id="quantity_{{$key}}" style="width:50%; "></td>
         <td><button type="button" onclick="buyorder({{$key}})" class="bg-success text-dark" style="font-weight: 800; width:55px; height:40px;">Buy</button></td>
         {{-- <td >${{$user->coin->price }}</td> --}}



    </tr>
    @endforeach


</table>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    function buyorder(index){


        var sell_id=$('#user_'+index).val();
        var coin_id=$('#coin_'+index).val();
        var quantity=$('#quantity_'+index).val();
      $.ajax({
            type : 'post',
           // url : '{{URL::to('search')}}',
             url:'{{route('coin.buyorderinsert')}}',
             data:{'_token' : '{{ csrf_token() }}',
                 'sell_id':sell_id,
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

    }
  </script>









@endsection
