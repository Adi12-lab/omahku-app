    <!-- HEADER -->
    <header>
        <!-- NAVBAR TOP -->
        <div class="topbar d-none d-sm-block">
            <div class="container ">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="topbar-left">
                            <div class="topbar-text">
                                {{ dateNow() }}
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="list-unstyled topbar-right">
                            <ul class="topbar-link">
                                <li><a href="#" title="">Career</a></li>
                                <li><a href="#" title="">Contact Us</a></li>
                                @if (!Auth::check())
                                    <li><a href="{{ route('login') }}" title="">Login</a></li>
                                    <li><a href="{{ route('register') }}" title="">Register</a></li>
                                @else
                                    <li> <a href="{{ route('frontend.profile') }}">Akun saya</a></li>
                                    <li>
                                        <form action="{{ route('logout') }}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                style="background: transparent; font-size:14px; font-weight:bold; color: #f7f30c; border:none; ">
                                                Logout
                                            </button>
                                        </form>
                                    </li>
                                @endif
                            </ul>
                            <ul class="topbar-sosmed">
                                <li>
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                </li>
                                <li>
                                    <a href="#"><i class="fa fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END NAVBAR TOP -->
        <!-- NAVBAR -->
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft">
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

                        <li class="nav-item"><a class="nav-link" href="/contact.html"> contact </a></li>
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

        <!-- BREADCRUMB -->
        @unless ($breadcrumbs->isEmpty())
            <div class="bg-theme-overlay">
                <section class="section__breadcrumb ">
                    <div class="container">
                        <div class="row d-flex justify-content-center">
                            <div class="col-md-8 text-center">
                                <h2 class="text-capitalize text-white">{{ $breadcrumbs->last()->title }}</h2>
                                <ul class="list-inline ">
                                    @foreach ($breadcrumbs as $breadcrumb)
                                        @if ($breadcrumb->url)
                                            <li class="list-inline-item">
                                                <a href="{{ $breadcrumb->url }}" class="text-white">
                                                    {{ $breadcrumb->title }}
                                                </a>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        @endunless
        <!-- END BREADCRUMB -->

    </header>
    <div class="clearfix"></div>
