<nav class="navbar navbar-expand bg-light">
    <h3 class="masthead-brand mx-auto"><a href="{{route('welcome')}}" class="nav-brand">KupujemProdajem</a></h3>
    <ul class="navbar-nav nav-pills mx-auto">
        @if (Route::has('login'))
            @auth
            <li class="nav-item"><a href="{{Route('welcome')}}" class="nav-link active">Home</a></li>
            <li class="nav-item"><a href="{{Route('userProfile')}}" class="nav-link">User Profile</a></li>
            <li class="nav-item"><a href="{{Route('newAd')}}" class="nav-link ">Dodaj oglas</a></li>
            <li class="nav-item"><a href="{{route('logout')}}" class="nav-link">Odjava</a></li>
            @else
            <li class="nav-item"><a href="{{route('login')}}" class="nav-link">Login</a></li>
            @if (Route::has('register'))
            <li class="nav-item"><a href="{{route('register')}}" class="nav-link">Register</a></li>
            @endif
            @endauth
        @endif
    </ul>
</nav>
