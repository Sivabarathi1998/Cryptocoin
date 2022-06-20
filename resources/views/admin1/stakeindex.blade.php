@extends('admin1.adminlayout')
@section('content')


<style>
    .table{
        width: 90%;
        border: 2px solid black;
        margin-top:50px;
    }
</style>



<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Stake Plans</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{route('stake.create') }}"> Create New Stake</a><br>

        </div>
    </div>
</div>



<table class="table table-bordered">
    <tr>
        <th>S.No</th>
        <th>Stake Name</th>

        <th>Coin</th>
        <th>Plan Duration</th>
        <th>Payouts(%)</th>
        <th>Min Investment</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($plans as $key => $plan)
    <tr>
        <td>{{ $key+1 }}</td>
        <td>{{ $plan->stakename }}</td>
        <td>{{ $plan->coin->cryptocoin}}</td>
        <td>{{ $plan->duration}}</td>
        <td>{{ $plan->payout }}</td>

        <td>{{ $plan->investment }}</td>
        <td>
            <form action="{{route('stake.destroy',$plan->id) }}" method="POST">



                <a class="btn btn-primary" href="{{route('stake.edit',$plan->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to Delete?');">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>








@endsection


