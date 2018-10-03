    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container">
        <!-- <a class="navbar-brand" href="/">Laravel Blog</a> -->
        <img class="navbar-brand" src="{{asset('storage/img/logo.png')}}" alt="logo">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="/">Home
              </a>
            </li>
            <li class="nav-item active">
              <a class="nav-link" href="/about">About
              </a>
            </li>
            @if(!auth()->check())
            <li class="nav-item">
              <a class="nav-link" href="/login">Sign In</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="/register">Register</a>
            </li>
            @endif
            @if (auth()->check())

            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle ml-auto" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              {{ auth()->user()->name }}
              </a>

              <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item" href="/dashboard">My dashboard</a>
                <a href="/posts/create" class="dropdown-item">Publish a post</a>                
                <a class="dropdown-item" href="/logout">Sign Out</a>
              </div>

            </li>
            @endif
          </ul>
        </div>
      </div>
    </nav>