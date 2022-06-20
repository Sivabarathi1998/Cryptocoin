<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=Barlow&display=swap');

body{
  font-family: 'Barlow', sans-serif;
}

a:hover{
  text-decoration: none;
}

.border-left{
  border-left: 2px solid var(--primary) !important;
}


.sidebar{
  top: 0;
  left : 0;
  z-index : 100;
  overflow-y: auto;
}

.overlay{
  background-color: rgb(0 0 0 / 45%);
  z-index: 99;
}

/* sidebar for small screens */
@media screen and (max-width: 767px){

  .sidebar{
    max-width: 18rem;
    transform : translateX(-100%);
    transition : transform 0.4s ease-out;
  }

  .sidebar.active{
    transform : translateX(0);
  }

}
</style>

<body>


<div class="container-fluid">
    <div class="row">
      <!-- sidebar -->
      <div class="col-md-3 col-lg-2 px-0 position-fixed h-100 bg-white shadow-sm sidebar" id="sidebar">
        <h1 class="bi bi-bootstrap text-primary d-flex my-4 justify-content-center"></h1>
        <div class="list-group rounded-0">
          <a href="#" class="list-group-item list-group-item-action active border-0 d-flex align-items-center">
            <span class="bi bi-border-all"></span>
            <span class="ml-2">Dashboard</span>
          </a>
          <a href="{{route('stake.index')}}" class="list-group-item list-group-item-action border-0 align-items-center">
            {{-- <span class="bi bi-box"></span> --}}
            <span class="ml-2">Stakeplan</span>
          </a>
          <a href="{{route('admin.stakepurchase')}}" class="list-group-item list-group-item-action border-0 align-items-center">
            <span class="bi bi-box"></span>
            <span class="ml-2">StakePurchases</span>
          </a>
          <a href="#" class="list-group-item list-group-item-action border-0 align-items-center">
            <span class="bi bi-box"></span>
            <span class="ml-2">Logout</span>
          </a>

        </div>
      </div>
      <!-- overlay to close sidebar on small screens -->
      <div class="w-100 vh-100 position-fixed overlay d-none" id="sidebar-overlay"></div>
      <!-- note: in the layout margin auto is the key as sidebar is fixed -->
      <div class="col-md-9 col-lg-10 ml-md-auto px-0">
        <!-- top nav -->
        <nav class="w-100 d-flex px-4 py-2 mb-4 shadow-sm">
          <!-- close sidebar -->
          <button class="btn py-0 d-lg-none" id="open-sidebar">
            <span class="bi bi-list text-primary h3"></span>
          </button>
          <div class="dropdown ml-auto">
            <button class="btn py-0 d-flex align-items-center" id="logout-dropdown" data-toggle="dropdown" aria-expanded="false">
              <span class="bi bi-person text-primary h4"></span>
              <span class="bi bi-chevron-down ml-1 mb-2 small"></span>
            </button>
            <div class="dropdown-menu dropdown-menu-right border-0 shadow-sm" aria-labelledby="logout-dropdown">
              <a class="dropdown-item" href="#">Logout</a>
              <a class="dropdown-item" href="#">Settings</a>
            </div>
          </div>
        </nav>
        <!-- main content -->
        <main class="container-fluid">
          <section class="row">
            <div class="col-md-6 col-lg-4">
              <!-- card -->
              <article class="p-4 rounded shadow-sm border-left
                 mb-4">
                <a href="#" class="d-flex align-items-center">
                  <span class="bi bi-box h5"></span>
                  <h5 class="ml-2">BTC</h5>
                </a>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="p-4 rounded shadow-sm border-left mb-4">
                <a href="#" class="d-flex align-items-center">
                  <span class="bi bi-person h5"></span>
                  <h5 class="ml-2">ETH</h5>
                </a>
              </article>
            </div>
            <div class="col-md-6 col-lg-4">
              <article class="p-4 rounded shadow-sm border-left mb-4">
                <a href="#" class="d-flex align-items-center">
                  <span class="bi bi-person-check h5"></span>
                  <h5 class="ml-2">DOGE</h5>
                </a>
              </article>
            </div>
          </section>
 {{-- @yield('content') --}}



        </main>
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  {{-- <script src="assets/js/app.js"></script> --}}
  <script>
      $(document).ready(()=>{

  $('#open-sidebar').click(()=>{

      // add class active on #sidebar
      $('#sidebar').addClass('active');

      // show sidebar overlay
      $('#sidebar-overlay').removeClass('d-none');

   });


   $('#sidebar-overlay').click(function(){

      // add class active on #sidebar
      $('#sidebar').removeClass('active');

      // show sidebar overlay
      $(this).addClass('d-none');

   });

});
  </script>

</body>
</html>
