@extends('auth.shared')
@section('selselva')



<div class="container-fluid">

    @if ($message = Session::get('success'))

    <div style="margin-left: 1200px; width:30%;" class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif




    <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <form action="{{route('login.custom')}}" method="post">
        @csrf
    <div class="form-group">
    <h1>LOGIN</h1><br><br>
    <label for="InputEmail1">Email Address</label>
    <input type="email" class="form-control col-md-12" name="email"id="InputEmail1" aria-describedby="emailHelp" placeholder="Email" required>
    </div>
    <div class="form-group">
    <label for="InputPassword1">Password</label>
    <input type="password" class="form-control col-md-12" name="password"id="InputPassword1" placeholder="Password" required>
    </div>
    <div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="Check1">
    <label class="form-check-label" id="rem" for="exampleCheck1">Remember Me</label>
    </div>
    <button type="submit" class="btn btn-primary col-md-12">Login</button><br><br>
    <p class="text-light">Don't have an account?<a class="btn btn-info" style="margin-left: 70px;" href="{{ route('register') }}">Register</a><p>

    </form>
    </div>
    </div>

    </div>
    <br><br>

@endsection

