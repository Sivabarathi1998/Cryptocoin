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
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif


  <a class="btn btn-primary" href="{{route('welcome')}}" style="margin-left: 1500px;"> Back</a>

  <table class="table table-bordered">

    <tr>
        <th  width="5%">Stakename</th>

        <th  width="5%">Cryptocoin</th>




        <th  width="5%">Duration</th>
        <th   width="5%">Payout   </th>
        <th  width="15%">Investment </th>
        <th  width="5%">Action</th>



    </tr>
    {{-- @php
    $i = 1
    @endphp --}}



     @foreach ($stakeplans as $key=>$stakeplan)
    <tr>

        <td>{{$stakeplan->stakename}}</td>
        <td>{{$stakeplan->coin->cryptocoin}}</td>

          <td>{{$stakeplan->duration}}</td>
          <td>{{$stakeplan->payout}}</td>
          <td>{{$stakeplan->investment}}</td>
          <td><a href="{{route('stake1.add',$stakeplan->id)}}"><button class="btn-primary">Add Stake</button></a></td>




    </tr>
    @endforeach


</table>

@endsection
