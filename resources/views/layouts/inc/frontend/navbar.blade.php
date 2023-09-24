 <!-- NAVBAR -->
 <nav class="navbar navbar-hover navbar-expand-lg navbar-soft {{isset($transparent) && $transparent ? "navbar-transparent" : ""}}">
    <div class="container">
        <a class="navbar-brand" href="#">
            <img src="images/logo-blue-stiky.png" alt="" class="img-fluid">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="main_nav99">
            <ul class="navbar-nav  mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('home') }}"> Home </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Route::is('frontend.property.index') ? 'active' : '' }}"
                        href="{{ route('frontend.property.index') }}"> Properti </a>
                </li>

                <li class="nav-item"><a class="nav-link" href="{{route("frontend.contact")}}"> kontak </a></li>
                <li class="nav-item"><a class="nav-link" href="{{route("frontend.agent")}}"> agen </a></li>

                @if (auth()->check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Akun
                        </a>
                        <ul class="dropdown-menu dropdown-menu-left animate fade-up">
                            <li><a class="dropdown-item" href="{{ route('frontend.profile') }}">Akun Saya </a>
                            </li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger"> Logout </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @else
                    <li class="nav-item"><a href="{{route("login")}}" class="nav-link">Login</a></li>
                @endif

            </ul>


            <!-- Search bar.// -->
            @if (auth()->check())
                <ul class="navbar-nav mr-3">
                    <li>
                        <a href="{{ route('frontend.profile') }}">
                            {{-- @dd(auth()->user()) --}}
                            <img src="{{ asset(auth()->user()->image ?? 'assets/images/80x80.jpg') }}"
                                alt="user_image"
                                style="width:70px; height:70px; object-fit: cover; border-radius: 50%;">
                        </a>
                    </li>
                </ul>
                <ul class="navbar-nav">
                    <li>
                        <a href="{{route("wishlist")}}" class="btn btn-primary text-capitalize">
                            <i class="fa fa-heart mr-1"></i>Favorit</a>
                    </li>
                </ul>
            @endif

        </div> <!-- navbar-collapse.// -->
    </div>
</nav>
<!-- END NAVBAR -->
