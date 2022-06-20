@extends('layout')
@section('content')
<a class="btn btn-primary" href="{{route('welcome')}}" style="margin-left: 1300px;"> Back</a>


<div class="row">
<div class="col-md-6 offset-md-3">
<div class="card">
<form action="{{url('swapstore')}}" method="POST">
   @csrf
   <div class="row">
      <div class="col-md-6 offset-md-3">    
         <div class="form-group">
            <strong>From:</strong>
            <select name="from_coin_id" myid="1" id="from" class="form-control from-section triggerswap" onchange="selectfunction()" >
                <option value="">Select</option>
                @foreach ( $datas as $data )
                <option value="{{$data->coin->id}}">{{$data->coin->cryptocoin}}</option>
                @endforeach
            </select>
         </div>
         <input type="number" id="fromquant"  step="any" name="from_coin_price"   class="form-control from-section triggerswap" style="width: 55%;" onkeyup="selectfunction()" ></form></td>

      </div>
      <div class="col-md-6 offset-md-3">
         <div class="form-group">
            <strong>To:</strong>
            <select name="to_coin_id" id="to" class="form-control to-section triggerswap" onchange="myfunction()" >
                <option value="">Select</option>
                @foreach (\App\Models\Coin::all() as $user )
               <option value="{{$user->id}}">{{$user->cryptocoin}}</option>
               @endforeach
            </select>
         </div>
         <input type="number" id="toquant" step="any" name="to_coin_price" class="form-control to-section triggerswap" style="width: 55%;" onkeyup="myfunction()"></form></td>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center" >
          <br>
         <button type="submit" class="btn btn-primary ">Swap</button>
         <button type="submit" class="btn btn-primary">Cancel</button>

      </div>
   </div>
</form>
 <script>
       /*   var type = undefined;
 $(document).ready(function(){
    function setdata(value){
        type = value
    }

    $('.triggerswap').change(function(){
        var flag = 'from';
        if($(this).hasClass('from-section')){
            flag = 'from';
        }else{
            flag = 'to';
        }
       var from=$('#from').val();
      var to=$('#to').val();
     // console.log(to);
      //console.log(from);
      var fromquant=$('#fromquant').val();
      var toquant=$('#toquant').val();
      var fromcoin=$('#fromcoin').val();
      var tocoin=$('#tocoin').val();
            console.log(flag);

        console.log(fromquant, fromcoin, toquant, tocoin);
      $.ajax({
             type : 'post',
             url:'{{url('swap-value')}}',
             data:{'_token' : '{{ csrf_token() }}',
                 'fromquantity': fromquant,
                 'toquantity':toquant,
                //   'fromcoin':fromcoin,
                //   'tocoin':tocoin,
                  'from_id':from,
                  'to_id':to,
                  'flag':flag,
                //   'type': type
                 },

                success:function(data){//dd(data);
                console.log(data);
                    $("#toquant").val(data.to_price);
                    $("#fromquant").val(data.from_price);


                }
            });

           });*/

           function selectfunction()
           {

            var from=$('#from').val();
            var to=$('#to').val();
            var fromquant=$('#fromquant').val();
            var toquant=$('#toquant').val();
            console.log(from, to, fromquant, toquant);
            $.ajax({
             type : 'post',
             url:'{{url('swap-value')}}/from',
             data:{'_token' : '{{ csrf_token() }}',
                 'fromquantity': fromquant,
                 'toquantity':toquant,
                  'from_id':from,
                  'to_id':to,
                //  'flag':flag,
                //   'type': type
                 },
                 success:function(data){//dd(data);
               // console.log(data);
                    $("#toquant").val(data.to_price);
                    $("#fromquant").val(data.from_price);


                }
            });



            }

         function myfunction()
           {
            var from=$('#from').val();
            var to=$('#to').val();
            var fromquant=$('#fromquant').val();
            var toquant=$('#toquant').val()

            $.ajax({
             type : 'post',
             url:'{{url('swap-value')}}/to',
             data:{'_token' : '{{ csrf_token() }}',
                 'fromquantity': fromquant,
                 'toquantity':toquant,

                  'from_id':from,
                  'to_id':to,
                //  'flag':flag,
                //   'type': type
                 },
                 success:function(data){//dd(data);
               // console.log(data);
                    $("#toquant").val(data.to_price);
                    $("#fromquant").val(data.from_price);


                }
            });


           }

</script>
@endsection

