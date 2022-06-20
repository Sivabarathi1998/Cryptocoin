@extends('layout')
@section('content')
<style>
.table-bordered th,td{
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

<a class="btn btn-primary" href="{{route('welcome')}}" style="margin-left: 1300px;"> Back</a>

<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">
            <br><br>
            {{-- <h2 style="margin-left:600px;">{{ucfirst(Auth()->user()->name)}} Purchase Details</h2> --}}
            <h2 style="margin-left:600px;">Your Transactions</h2>

        </div>


    </div>

</div>




<br>
<table class="table table-bordered">

    <tr>

        {{-- <th  width="5%">Name</th> --}}

        {{-- <th  width="15%">Symbol</th> --}}



        <th  width="15%">Coin</th>
        {{-- <th  width="5%">Date</th> --}}
        <th  width="15%">Quantity </th>
        {{-- <th  width="15%">Action</th> --}}
        <th  width="15%"> Price </th>
        <th  width="15%"> Purchased at </th>



    </tr>
    {{-- @php
    $i = 1
    @endphp --}}



      @foreach ($purchases as $purchase)

    <tr>

           {{-- <td >{{$purchase->user->name }}</td> --}}

         <td >{{$purchase->coin->cryptocoin  }}</td>
         <td >{{$purchase->quantity  }}</td>
         <td >${{$purchase->totalprice  }}</td>
         <td >{{$purchase->created_at  }}</td>

 </tr>

    @endforeach


</table>


{{-- {!! $purchases->links('pagination::bootstrap-4') !!} --}}

@endsection

