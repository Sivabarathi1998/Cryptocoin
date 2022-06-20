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
<h1 style="margin-left: 580px;">Your Stake Plans</h1>
<a class="btn btn-primary" href="{{route('welcome')}}" style="margin-left: 1500px;"> Back</a>
<table class="table table-bordered">

    <tr>
        <th  width="5%">Stakename</th>
        <th  width="5%">Tenure Date</th>
        <th  width="5%">Investment Quantity</th>
        <th   width="5%">Payout Amount  </th>
        <th   width="5%">Payout perminute  </th>
        <th   width="5%">Payout perhour  </th>
        <th   width="5%">Payout perday  </th>
        <th   width="5%">Payout permonth  </th>
    </tr>




     @foreach ($stakepurchases as $key=>$stakepurchase)
    <tr>

        <td>{{$stakepurchase->stakeplan}}</td>
        <td>{{$stakepurchase->tenuredate}}</td>

          <td>{{$stakepurchase->invest_quantity}}</td>
          <td>{{$stakepurchase->payoutamount}}</td>
          <td>{{$stakepurchase->payout_perminute}}</td>
          <td>{{$stakepurchase->payout_perhour}}</td>
          <td>{{$stakepurchase->payout_perday}}</td>
          <td>{{$stakepurchase->payout_permonth}}</td>




    </tr>
    @endforeach


</table>

@endsection
