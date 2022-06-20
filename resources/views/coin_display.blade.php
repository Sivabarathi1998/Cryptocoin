@extends('layout')
@section('content')
<style>
.table-bordered th ,td{
    border:2px solid green;
    text-align: center;
    font-size: 17px;

}
.table{
    width:50%!important;
    margin-left: 350px;
}
.table-bordered td{
    text-align: center;
    border:2px solid green;

}


</style>
{{-- <h1 class="welcome" style="margin-left: 500px;">Welcome  {{ucfirst(Auth()->user()->name)}}</h1> --}}
<a class="btn btn-primary" href="{{route('welcome')}}" style="margin-left: 1300px;"> Back</a>

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">
            <br><br>
            <h2 style="margin-left:600px;">Cryptocoin</h2>

        </div>

        <div class="pull-right">
            <br><br>

        </div>

    </div>

</div>




<br>
<table class="table table-bordered">

    <tr>

        <th  width="5%">Cryptocoin</th>

        {{-- <th  width="15%">Symbol</th> --}}



        <th  width="15%">Currency</th>
        {{-- <th  width="5%">Date</th> --}}
        <th  width="15%">Price </th>
        {{-- <th  width="15%">Action</th> --}}



    </tr>
    {{-- @php
    $i = 1
    @endphp --}}



     @foreach ($coins as $coin)

    <tr>

           <td >{{$coin->cryptocoin }}</td>

         {{-- <td >{{$coin->currency  }}</td> --}}
         <td>usd</td>
         <td >{{$coin->price  }}</td>



    </tr>

    @endforeach

</table>


{!! $coins->links('pagination::bootstrap-4') !!}

@endsection

