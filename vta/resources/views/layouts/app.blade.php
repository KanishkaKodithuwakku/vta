<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>VTA Payments</title>
  <link href="{{ asset('dist/css/bootstrap.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>

  <div class="container">


    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">VTA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">



            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink" href="#" role="button" aria-haspopup="true" aria-expanded="false">Projects</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('project.index')}}">View projects</a>
                  <a class="dropdown-item" href="{{ route('project.create')}}">Add new project</a>
                </div>
              </li>


            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink" href="#" role="button" aria-haspopup="true" aria-expanded="false">Categories</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('category.index')}}">View categories</a>
                  <a class="dropdown-item" href="{{ route('category.create')}}">Add new categories</a>
                </div>
              </li>




            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbarDropdownMenuLink" href="#" role="button" aria-haspopup="true" aria-expanded="false">Activity</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="{{ route('activity.index')}}">View activities</a>
                  <a class="dropdown-item" href="{{ route('activity.create')}}">Add new activity</a>
                </div>
              </li>



            <li class="nav-item">
              <a class="nav-link" href="{{ route('transaction.index')}}">Transaction</a>
            </li>
          </ul>
        </div>
      </nav>


    @yield('content')
  </div>
  <script src="{{ asset('dist/js/jquery.min.js') }}"></script>
  <script src="{{ asset('dist/js/popper.min.js') }}"></script>
  <script src="{{ asset('dist/js/bootstrap.js') }}"></script>
</body>
</html>
