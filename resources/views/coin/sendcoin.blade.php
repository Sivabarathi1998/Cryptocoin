@extends('layout')
@section('content')
<style>

.send{
    width: 15%;
    border-radius: 6px;
        margin-left: 230px;
        height: 35px;


}
option{
    font-weight: 900;

}
strong{
        font-weight: 900;
        font-size: 15px;
    }

    .card{
        width: 35%!important;

        margin-left: 375px;
        margin-top: 80px;
        border: none!important;
        padding: 55px;
        border-radius: 50px;
        box-shadow: 5px 5px 10px #ad8ed6;
    }
</style>
{{-- <h1>
{{$randomString}}</h1> --}}
@if ($message = Session::get('success'))

    <div style="margin-left: 1200px; width:30%;" class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif

@if ($error = Session::get('error'))

<div style="margin-left: 1200px; width:30%;" class="alert alert-danger">

    <p>{{ $error }}</p>

</div>

@endif

<div class="card">
    <form action="{{route('sendcoin.insert')}}" method="post">
@csrf
   <div class="row">

    <strong class="col sm-6" >To Address:</strong>
    <input type="text" class="form-control" style="width:55%; " class="col sm-8" name="address">
   </div><br>
   <div class="row">

    <strong class="col sm-6">Coin:</strong>
<select name="coin_id"  class="form-control" style="width:55%; " id="coins" class="col sm-8" >
    <option value="">Select Coin</option>
    @foreach ($coins as $coin )
    <option value="{{$coin->coin->id}}">{{$coin->coin->cryptocoin}}</option>

    @endforeach
</select>
    </div><br>
    <div class="row">

        <strong class="col sm-6" >Amount:</strong>
        <input type="text" class="form-control" style="width:55%; " id="quantity" class="col sm-8" name="amount">
       </div><br>

       <div class="row">
        <strong class="col sm-6" >Price:</strong>
        <input type="text" class="form-control" style="width:55%; " id="totalprice" class="col sm-8">
       </div><br>

<button type="submit" class="bg-primary text-light send">Send</button>
</form>

  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script>

          $('#coins').change(function(){

        var value=$('#quantity').val();
        var coin=$('#coins').val();
        $.ajax({
              type : 'post',
               url:'{{route('totalprice')}}',
               data:{'_token' : '{{ csrf_token() }}',
                   'quantity': value,
                    'coin':coin,

                   },

                  success:function(data){//dd(data);
                      $("#totalprice").val(data);
                  }
              });

    });
    $('#quantity').keyup(function(){

var value=$('#quantity').val();
var coin=$('#coins').val();
$.ajax({
      type : 'post',
       url:'{{route('totalprice')}}',
       data:{'_token' : '{{ csrf_token() }}',
           'quantity': value,
            'coin':coin,

           },

          success:function(data){//dd(data);
              $("#totalprice").val(data);
          }
      });

});
    </script>


@endsection

