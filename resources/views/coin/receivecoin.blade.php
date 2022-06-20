@extends('layout')
@section('content')
<style>
.heading{
    margin-left: 600px;
    width: 35%!important;
     color:black;
     font-weight: 600;

}
.qrcode
{
    margin-left: 600px;
   margin-top: 80px;
   /* border: none!important; */
   padding: 55px;
   border-radius: 50px;
   box-shadow: 15px 15px 10px #ad8ed6;
   width: 19%!important;
   border:4px solid red;
   
}
#qrcode
{
    padding: 100px 0px;
}
</style>

<section id="qrcode">
    <div class="">
        <h1 class="heading  ">Scan QR Code To Pay</h1>
        <div class=" qrcode" style="margin-top: 50px;">{!! $qrcode !!}</div>
    </div>
</section>

@endsection
