 <!-- NAVBAR TOP -->
 <div class="topbar d-none d-sm-block">
    <div class="container ">
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <div class="topbar-left">
                    <div class="topbar-text">
                        {{dateNow()}}
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-7">
                <div class="list-unstyled topbar-right">
                    <ul class="topbar-link">
                        <li><a href="{{route("frontend.contact")}}">Hubungi</a></li>
                        @if (!Auth::check())
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
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