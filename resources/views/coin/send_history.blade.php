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
     <div class="row">
        <h2 style="margin-left:600px;">Your Sent History</h2>
        <a class="btn btn-primary" href="{{route('welcome')}}" style="margin-left: 1300px;"> Back</a>

     </div>





    <br>
    <table class="table table-bordered">

        <tr>

            {{-- <th  width="5%">Name</th> --}}




            <th  width="15%">Credited To</th>
            <th  width="15%">Coin </th>
            <th  width="15%"> Amount </th>
            <th  width="15%"> Date </th>



        </tr>
        {{-- @php
        $i = 1
        @endphp --}}



          @foreach ($sendcoins as $sendcoin)

        <tr>


             <td >{{$sendcoin->to_address  }}</td>
             <td >{{$sendcoin->coin->cryptocoin  }}</td>
             <td >{{$sendcoin->amount  }}</td>
             <td >{{$sendcoin->created_at  }}</td>

       </tr>

        @endforeach


    </table>


    {!! $sendcoins->links('pagination::bootstrap-4') !!}

@endsection
