@extends('layout')
@section('content')
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 200px;
  background-color: #f1f1f1;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #04AA6D;
  color: white;
}

li a:hover:not(.active) {
  /* background-color: #555; */
  /* color: white; */
}
.table-bordered td, .table-bordered th
{
    border:1px solid #196352b8;

}
.card{
    width: 45%!important;
    margin-left: 375px;
    margin-top: 80px;
    border: none!important;
    padding: 55px;
        border-radius: 50px;
        box-shadow: 5px 5px 10px #ad8ed6;
}
h1,p{
    margin-left: 30px;
}
</style>
<br>
@if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif
{{-- <div class="row" style="margin-top: 250px;">
    <ul>
        <li><a class="active" href="{{route('profile')}}" >User Details</a></li>
        <li><a href="{{route('image.upload')}}">Change Profile</a></li>
      </ul> --}}
<div class="card">
    <img src="{{asset('storage/'.Auth()->user()->image)}}" style="width:150px; height:150px; float:left; border-radius:50%; margin-left:200px;"><br>
   <div class="row">
        {{-- <img src="{{asset('user1.png')}}" style="width:50px; height:50px; float:left; border-radius:50%; margin-left:190px;"> --}}
     <h1 style="color: black ">{{Auth()->user()->name}}</h1>
    </div>
    <div class="row">
    {{-- <img src="{{asset('email.png')}}" style="width:50px; height:50px; float:left; border-radius:50%; margin-left:190px;"> --}}
    <p style="color: black "><b>{{Auth()->user()->email}}</p><b>
    </div>
    <a class="btn btn-primary" href="{{ route('profile.edit') }}" style="margin-left: 260px;">Edit</a>

  </div>
{{-- </div> --}}






@endsection
