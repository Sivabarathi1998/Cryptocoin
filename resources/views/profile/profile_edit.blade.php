@extends('layout')
@section('content')

<style>
    label
    {
        color: #000;
    }
    .card
    {
        padding: 25px;
        border-radius: 50px;
        box-shadow: 5px 5px 10px #ad8ed6;
    }
    </style>

    <div class="row">
        <a class="btn btn-primary" style="margin-left: 1290px; margin-top:30px;"  href="{{ url('profile') }}"> Back</a>

        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Update Profile</h2>
            </div>

        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops</strong> There were some problems with your input<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

<div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card">
                <form action="{{route('profile.update')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                        <div class="col-md-12">
                        <div class="form-group">
                            <label><b>Name:</b></label>
                            <input type="text" name="name" value="{{ Auth()->user()->name }}" class="form-control" placeholder="name">
                        </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b> email:</b></label>
                                <input type="email" name="email" value="{{ Auth()->user()->email }}" class="form-control" placeholder="email">
                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label><b>Image:</b></label>
                                <input type="file" name="image" value="{{ Auth()->user()->image }}" class="form-control" placeholder="Image">
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" value="Reset" class="btn btn-warning" style="color:white;">Reset</button>
                        </div>

                </form>
            </div>
        </div>
    </div>

@endsection
