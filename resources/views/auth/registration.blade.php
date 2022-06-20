<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>Document</title>
    <style>
        body{
            background: #30E8BF;  /* fallback for old browsers */
background: -webkit-linear-gradient(to right, #FF8235, #30E8BF);  /* Chrome 10-25, Safari 5.1-6 */
background: linear-gradient(to right, #FF8235, #30E8BF); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

}
form{
    margin-top: 100px;
    margin-left: 550px;
    margin-right: 150px;
    margin-bottom: 100px;
    border: 2px solid white;
    border-radius: 4px;
    width: 30%;
    padding: 50px 50px 50px 50px;

}
button{
    margin-left: 230px;
    background: green;
    padding: 10px;

}
input{
    padding: 8px;
    text-align: center;
    display: table;
    margin-left: 160px;
}
label{
    margin-left: 235px;
    color: white;
    font-size:20px;
}
.button2 {background-color: #008CBA;}


#head{
    color: white !important;
    font-size: 70px!important;
    font-family: Verdana, Geneva, Tahoma, sans-serif!important;
    text-align: center !important;
}


    </style>
  </head>
  <body>
    <div class="container">
      <form id="form" class="form" action="{{route('register.custom')}}" autocomplete="off" method="post" enctype="multipart/form-data">
        @csrf
        <h2 id="head">Registration</h2>
        <div class="form-control">
          <label for="username">Username</label><br><br>
          <input type="text" id="username" placeholder="Enter username" name="name" value="{{old(('name'))}}"/><br><br>
             @if ($errors->has('name'))
            <span class="text-danger" style="color:brown;margin-left:200px;font-weight:bolder;font-size:15px;">{{$errors->first('name')}}</span>
             @endif
        </div>
        <div class="form-control">
          <label for="email" >Email</label><br><br>
            <input type="text" id="email" name="email"  placeholder="Enter Email" value="{{old(('email'))}}" /><br><br>
                @if ($errors->has('email'))
                             <span class="text-danger" style="color:brown;margin-left:200px;font-weight:bolder;font-size:15px;">{{$errors->first('email')}}</span>
                 @endif
        </div>
        <div class="form-control">
              <label for="password">Password</label><br><br>
          <input type="password" id="password" placeholder="Enter password" name="password" value="{{old(('password'))}}" /><br><br>
          @if ($errors->has('password'))
          <span class="text-danger" style="color:brown;margin-left:200px;font-weight:bolder;font-size:15px;">{{$errors->first('password')}}</span>
               @endif
        </div>
        <div class="form-control">
            <label for="image">Upload Image</label><br><br>

        <input type="file" name="image" style=" margin-left:190px;" ><br>
        </div>
        <button type="submit">Submit</button>
        <p style="color: white; margin-left:95px;font-size:20px;">Already have an account:<a class="button2" style="margin-left: 30px; color:black; font-size:20px;" href="{{ route('login') }}">Login here</a><p>

      </form>
    </div>

  </body>
</html>
