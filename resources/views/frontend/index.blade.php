<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Rethouse - Real Estate HTML Template">
    <meta name="keywords" content="Real Estate, Property, Directory Listing, Marketing, Agency" />
    <meta name="author" content="mardianto - retenvi.com">
    <title>Rethouse - Real Estate HTML Template</title>

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="" />
    <meta property="og:image" content="" />
    <meta property="og:url" content="" />
    <meta property="og:site_name" content="" />
    <meta property="og:description" content="" />
    <meta name="twitter:title" content="" />
    <meta name="twitter:image" content="" />
    <meta name="twitter:url" content="" />
    <meta name="twitter:card" content="" />

    <link rel="manifest" href="site.webmanifest">
    <!-- favicon.ico in the root directory -->
    <link rel="apple-touch-icon" href="icon.png">
    <meta name="theme-color" content="#3454d1">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
</head>

<body>
    <!-- NAVBAR TOP -->
    <div class="topbar d-none d-sm-block">
        <div class="container ">
            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <div class="topbar-left">
                        <div class="topbar-text">
                            Monday, March 22, 2020
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
                                <li> <a href="{{route("profile")}}">Akun saya</a></li>
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
    <!-- HEADER -->
    <header class="jumbotron bg-theme">
        <div class="bg-overlay"></div>
        <!-- NAVBAR -->
        <nav class="navbar navbar-hover navbar-expand-lg navbar-soft navbar-transparent">
            <div class="container">
                <a class="navbar-brand" href="/homepage-v1.html">
                    <img src="images/logo-blue.png" alt="">
                    <img src="images/logo-blue-stiky.png" alt="">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav99">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="main_nav99">
                    <ul class="navbar-nav mx-auto ">
                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown"> Home </a>
                            <ul class="dropdown-menu dropdown-menu-left animate fade-up">
                                <li><a class="dropdown-item" href="/homepage-v1.html"> Home version one </a>
                                </li>
                                <li><a class="dropdown-item" href="homepage-v2.html"> Home version two </a></li>
                                <li><a class="dropdown-item" href="/homepage-v3.html"> Home version three </a></li>
                                <li><a class="dropdown-item" href="/homepage-v4.html"> Home version four </a></li>
                                <li><a class="dropdown-item" href="/homepage-v5.html"> Home version five </a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown"> Pages </a>
                            <ul class="dropdown-menu animate fade-up">

                                <li><a class="dropdown-item icon-arrow" href="#"> Property Listing </a>
                                    <ul class="submenu dropdown-menu  animate fade-up">
                                        <li><a class="dropdown-item" href="/listing-style-v1.html"> Style 1</a></li>
                                        <li><a class="dropdown-item" href="/listing-style-v2.html"> Style 2</a></li>
                                        <li><a class="dropdown-item" href="/listing-style-v3.html"> Style 3</a></li>
                                        <li><a class="dropdown-item" href="/listing-style-v4.html"> Style 4</a></li>
                                        <li><a class="dropdown-item" href="/listing-style-v5.html"> Style 5</a></li>

                                        <li><a class="dropdown-item icon-arrow" href="">Submenu item 3 </a>
                                            <ul class="submenu dropdown-menu  animate fade-up">
                                                <li><a class="dropdown-item" href="">Multi level 1</a></li>
                                                <li><a class="dropdown-item" href="">Multi level 2</a></li>
                                            </ul>
                                        </li>
                                        <li><a class="dropdown-item" href="">Submenu item 4</a></li>
                                        <li><a class="dropdown-item" href="">Submenu item 5</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item icon-arrow" href="#"> Property single detail </a>
                                    <ul class="submenu dropdown-menu  animate fade-up">
                                        <li><a class="dropdown-item" href="/single-detail-v1.html">Style 1</a></li>
                                        <li><a class="dropdown-item" href="/single-detail-v2.html">Style 2</a></li>
                                        <li><a class="dropdown-item" href="/single-detail-v3.html">Style 3</a></li>
                                        <li><a class="dropdown-item" href="/single-detail-v4.html">Style 4</a></li>
                                        <li><a class="dropdown-item" href="/single-detail-v5.html">Style 5</a></li>
                                    </ul>
                                </li>

                                <li><a class="dropdown-item icon-arrow" href="#"> Agent </a>
                                    <ul class="submenu dropdown-menu  animate fade-up">
                                        <li><a class="dropdown-item" href="/agents-v1.html">Style 1</a></li>
                                        <li><a class="dropdown-item" href="/agents-v2.html">Style 2</a></li>
                                        <li><a class="dropdown-item" href="/agents-detail.html">Agent detail</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item icon-arrow" href="#"> Agency </a>
                                    <ul class="submenu dropdown-menu  animate fade-up">
                                        <li><a class="dropdown-item" href="/agency-v1.html">Style 1</a></li>
                                        <li><a class="dropdown-item" href="/agency-v2.html">Style 2</a></li>
                                        <li><a class="dropdown-item" href="/agency-detail.html">Agency detail</a></li>
                                    </ul>
                                </li>
                                <li><a class="dropdown-item" href="/about-us.html">About us </a>
                                <li><a class="dropdown-item" href="/login.html">Login </a>
                                <li><a class="dropdown-item" href="/register.html"> Register </a>
                                <li><a class="dropdown-item" href="/contact.html"> Contact </a>
                                <li><a class="dropdown-item" href="/404.html"> 404 Error </a>
                            </ul>
                        </li>



                        <li class="nav-item dropdown">
                            <a class="nav-link active dropdown-toggle" href="#" data-toggle="dropdown"> Blog
                            </a>
                            <ul class="dropdown-menu dropdown-menu-left animate fade-up">
                                <li><a class="dropdown-item" href="/blog.html"> Blog </a>
                                </li>
                                <li><a class="dropdown-item" href="/blog-single.html"> Blog Single </a></li>


                            </ul>
                        </li>

                        <li class="nav-item"><a class="nav-link" href="/contact.html"> contact </a></li>
                    </ul>


                    <!-- Search bar.// -->
                    <ul class="navbar-nav ">
                        <li>
                            <a href="#" class="btn btn-primary text-capitalize">
                                <i class="fa fa-plus-circle mr-1"></i> add listing</a>
                        </li>
                    </ul>
                    <!-- Search content bar.// -->
                    <div class="top-search navigation-shadow">
                        <div class="container">
                            <div class="input-group ">
                                <form action="#">

                                    <div class="row no-gutters mt-3">
                                        <div class="col">
                                            <input class="form-control border-secondary border-right-0 rounded-0"
                                                type="search" value="" placeholder="Search "
                                                id="example-search-input4">
                                        </div>
                                        <div class="col-auto">
                                            <a class="btn btn-outline-secondary border-left-0 rounded-0 rounded-right"
                                                href="/search-result.html">
                                                <i class="fa fa-search"></i>
                                            </a>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Search content bar.// -->
                </div> <!-- navbar-collapse.// -->
            </div>
        </nav>
        <!-- END NAVBAR -->
        <!-- HERO -->
        <div class="wrap__intro d-flex align-items-md-center ">
            <div class="container  ">
                <div class="row align-items-center justify-content-start flex-wrap">
                    <div class="col-md-10 mx-auto">
                        <div class="wrap__intro-heading text-center" data-aos="fade-up">
                            <!-- <h4>the walls property</h4> -->
                            <h1>
                                Find Your Dream House </h1>
                            <p>Your Property, Our Priority and From as low as $10 per day with limited time offer
                                discounts</p>

                            <!-- SEARCH BAR -->
                            <div class="wrapper__section">
                                <div class="wrapper__section__components">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <!-- <h3 class="section_heading mt-4">Form Search with Categories</h3> -->
                                            <div class=" search__container">
                                                <div class="row input-group no-gutters">
                                                    <div class="col-sm-12 col-md-5">
                                                        <input type="text" class="form-control"
                                                            aria-label="Text input"
                                                            placeholder="Search for Homes by Address, City . . . .">
                                                    </div>


                                                    <div class="col-sm-12 col-md-4 input-group">

                                                        <select class="select_option form-control" name="select"
                                                            id="categories">
                                                            <option selected>All Categories</option>
                                                            <option>House</option>
                                                            <option>Apartement </option>
                                                            <option>Hotel</option>
                                                            <option>Residential</option>
                                                            <option>Land</option>
                                                            <option>Luxury</option>

                                                        </select>

                                                    </div>
                                                    <div class="col-sm-12 col-md-3 input-group-append">
                                                        <button class="btn btn-primary btn-block" type="submit">
                                                            <i class="fa fa-search"></i> <span
                                                                class="ml-1 text-uppercase">Search</span>
                                                        </button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END HERO -->
    </header>
    <!-- END HEADER -->

    <!-- FEATURED PROPERTIES -->
    <section class="featured__property ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <div class="title__head">
                        <h2 class="text-center text-capitalize">
                            featured properties
                        </h2>
                        <p class="text-center text-capitalize">handpicked exclusive properties by our team.</p>

                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="featured__property-carousel owl-carousel owl-theme">
                        <div class="item">
                            <!-- ONE -->
                            <div class="card__image card__box">
                                <div class="card__image-header h-250">
                                    <div class="ribbon text-capitalize">featured</div>
                                    <img src="images/600x400.jpg" alt=""
                                        class="img-fluid w100 img-transition">
                                    <div class="info"> for sale</div>
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary text-capitalize mb-2">house</span>
                                    <h6 class="text-capitalize">
                                        vila in coral gables
                                    </h6>

                                    <p class="text-capitalize">
                                        <i class="fa fa-map-marker"></i>
                                        west flaminggo road, las vegas
                                    </p>
                                    <ul class="list-inline card__content">
                                        <li class="list-inline-item">

                                            <span>
                                                baths <br>
                                                <i class="fa fa-bath"></i> 2
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                beds <br>
                                                <i class="fa fa-bed"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                rooms <br>
                                                <i class="fa fa-inbox"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                area <br>
                                                <i class="fa fa-map"></i> 4300 sq ft
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                tom wilson <br>
                                            </a>

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item ">
                                            <h6>$350.000</h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <!-- TWO -->
                            <div class="card__image card__box">
                                <div class="card__image-header h-250">
                                    <div class="ribbon text-capitalize">featured</div>
                                    <img src="images/600x400.jpg" alt=""
                                        class="img-fluid w100 img-transition">
                                    <div class="info"> for sale</div>
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary text-capitalize mb-2">house</span>
                                    <h6 class="text-capitalize">
                                        Ample Apartment At Last Floor
                                    </h6>

                                    <p class="text-capitalize">
                                        <i class="fa fa-map-marker"></i>
                                        west flaminggo road, las vegas
                                    </p>
                                    <ul class="list-inline card__content">
                                        <li class="list-inline-item">

                                            <span>
                                                baths <br>
                                                <i class="fa fa-bath"></i> 2
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                beds <br>
                                                <i class="fa fa-bed"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                rooms <br>
                                                <i class="fa fa-inbox"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                area <br>
                                                <i class="fa fa-map"></i> 4300 sq ft
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                tom wilson <br>
                                            </a>

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item">

                                            <h6>$350.000</h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <!-- THREE -->
                            <div class="card__image card__box">
                                <div class="card__image-header h-250">
                                    <div class="ribbon text-capitalize">featured</div>
                                    <img src="images/600x400.jpg" alt=""
                                        class="img-fluid w100 img-transition">
                                    <div class="info"> for sale</div>
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary text-capitalize mb-2">house</span>
                                    <h6 class="text-capitalize">
                                        Contemporary Apartment
                                    </h6>

                                    <p class="text-capitalize">
                                        <i class="fa fa-map-marker"></i>
                                        west flaminggo road, las vegas
                                    </p>
                                    <ul class="list-inline card__content">
                                        <li class="list-inline-item">

                                            <span>
                                                baths <br>
                                                <i class="fa fa-bath"></i> 2
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                beds <br>
                                                <i class="fa fa-bed"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                rooms <br>
                                                <i class="fa fa-inbox"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                area <br>
                                                <i class="fa fa-map"></i> 4300 sq ft
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                tom wilson <br>
                                            </a>

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item">

                                            <h6>$350.000</h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <!-- FOUR -->
                            <div class="card__image card__box">
                                <div class="card__image-header h-250">
                                    <div class="ribbon text-capitalize">featured</div>
                                    <img src="images/600x400.jpg" alt=""
                                        class="img-fluid w100 img-transition">
                                    <div class="info"> for sale</div>
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary text-capitalize mb-2">house</span>
                                    <h6 class="text-capitalize">
                                        Family Home For Sale
                                    </h6>

                                    <p class="text-capitalize">
                                        <i class="fa fa-map-marker"></i>
                                        west flaminggo road, las vegas
                                    </p>
                                    <ul class="list-inline card__content">
                                        <li class="list-inline-item">

                                            <span>
                                                baths <br>
                                                <i class="fa fa-bath"></i> 2
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                beds <br>
                                                <i class="fa fa-bed"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                rooms <br>
                                                <i class="fa fa-inbox"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                area <br>
                                                <i class="fa fa-map"></i> 4300 sq ft
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                tom wilson <br>
                                            </a>

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item">

                                            <h6>$350.000</h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <!-- FIVE -->
                            <div class="card__image card__box">
                                <div class="card__image-header h-250">
                                    <div class="ribbon text-capitalize">featured</div>
                                    <img src="images/600x400.jpg" alt=""
                                        class="img-fluid w100 img-transition">
                                    <div class="info"> for sale</div>
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary text-capitalize mb-2">house</span>
                                    <h6 class="text-capitalize">
                                        184 Lexington Avenue
                                    </h6>

                                    <p class="text-capitalize">
                                        <i class="fa fa-map-marker"></i>
                                        west flaminggo road, las vegas
                                    </p>
                                    <ul class="list-inline card__content">
                                        <li class="list-inline-item">

                                            <span>
                                                baths <br>
                                                <i class="fa fa-bath"></i> 2
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                beds <br>
                                                <i class="fa fa-bed"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                rooms <br>
                                                <i class="fa fa-inbox"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                area <br>
                                                <i class="fa fa-map"></i> 4300 sq ft
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                tom wilson <br>
                                            </a>

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item">

                                            <h6>$350.000</h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <!-- SIX -->
                            <div class="card__image card__box">
                                <div class="card__image-header h-250">
                                    <div class="ribbon text-capitalize">featured</div>
                                    <img src="images/600x400.jpg" alt=""
                                        class="img-fluid w100 img-transition">
                                    <div class="info"> for sale</div>
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary text-capitalize mb-2">house</span>
                                    <h6 class="text-capitalize">
                                        Luxury Villa With Pool
                                    </h6>

                                    <p class="text-capitalize">
                                        <i class="fa fa-map-marker"></i>
                                        west flaminggo road, las vegas
                                    </p>
                                    <ul class="list-inline card__content">
                                        <li class="list-inline-item">

                                            <span>
                                                baths <br>
                                                <i class="fa fa-bath"></i> 2
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                beds <br>
                                                <i class="fa fa-bed"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                rooms <br>
                                                <i class="fa fa-inbox"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                area <br>
                                                <i class="fa fa-map"></i> 4300 sq ft
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                tom wilson <br>
                                            </a>

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item">

                                            <h6>$350.000</h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="card__image card__box">
                                <div class="card__image-header h-250">
                                    <div class="ribbon text-capitalize">featured</div>
                                    <img src="images/600x400.jpg" alt=""
                                        class="img-fluid w100 img-transition">
                                    <div class="info"> for sale</div>
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary text-capitalize mb-2">house</span>
                                    <h6 class="text-capitalize">
                                        The Citizen Apartment 5th Floor
                                    </h6>

                                    <p class="text-capitalize">
                                        <i class="fa fa-map-marker"></i>
                                        west flaminggo road, las vegas
                                    </p>
                                    <ul class="list-inline card__content">
                                        <li class="list-inline-item">

                                            <span>
                                                baths <br>
                                                <i class="fa fa-bath"></i> 2
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                beds <br>
                                                <i class="fa fa-bed"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                rooms <br>
                                                <i class="fa fa-inbox"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                area <br>
                                                <i class="fa fa-map"></i> 4300 sq ft
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                tom wilson <br>
                                            </a>

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item">

                                            <h6>$350.000</h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <!-- SEVEN -->
                            <div class="card__image card__box">
                                <div class="card__image-header h-250">
                                    <div class="ribbon text-capitalize">featured</div>
                                    <img src="images/600x400.jpg" alt=""
                                        class="img-fluid w100 img-transition">
                                    <div class="info"> for sale</div>
                                </div>
                                <div class="card__image-body">
                                    <span class="badge badge-primary text-capitalize mb-2">house</span>
                                    <h6 class="text-capitalize">
                                        Family Home For Sale
                                    </h6>

                                    <p class="text-capitalize">
                                        <i class="fa fa-map-marker"></i>
                                        west flaminggo road, las vegas
                                    </p>
                                    <ul class="list-inline card__content">
                                        <li class="list-inline-item">

                                            <span>
                                                baths <br>
                                                <i class="fa fa-bath"></i> 2
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                beds <br>
                                                <i class="fa fa-bed"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                rooms <br>
                                                <i class="fa fa-inbox"></i> 3
                                            </span>
                                        </li>
                                        <li class="list-inline-item">
                                            <span>
                                                area <br>
                                                <i class="fa fa-map"></i> 4300 sq ft
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card__image-footer">
                                    <figure>
                                        <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                                    </figure>
                                    <ul class="list-inline my-auto">
                                        <li class="list-inline-item">
                                            <a href="#">
                                                tom wilson
                                            </a>

                                        </li>

                                    </ul>
                                    <ul class="list-inline my-auto ml-auto">
                                        <li class="list-inline-item">

                                            <h6>$350.000</h6>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- END FEATURED PROPERTIES -->

    <!-- RECENT PROPERTY -->
    <section class="featured__property bg-light">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <div class="title__head">
                        <h2 class="text-center text-capitalize">
                            Recent Property
                        </h2>
                        <p class="text-center text-capitalize">We provide full service at every step.</p>

                    </div>
                </div>
            </div>
            <div class="featured__property-carousel owl-carousel owl-theme">
                <div class="item">
                    <!-- ONE -->
                    <div class="card__image card__box">
                        <div class="card__image-header h-250">
                            <div class="ribbon text-capitalize">featured</div>
                            <img src="images/600x400.jpg" alt="" class="img-fluid w100 img-transition">
                            <div class="info"> for sale</div>
                        </div>
                        <div class="card__image-body">
                            <span class="badge badge-primary text-capitalize mb-2">house</span>
                            <h6 class="text-capitalize">
                                vila in coral gables
                            </h6>

                            <p class="text-capitalize">
                                <i class="fa fa-map-marker"></i>
                                west flaminggo road, las vegas
                            </p>
                            <ul class="list-inline card__content">
                                <li class="list-inline-item">

                                    <span>
                                        baths <br>
                                        <i class="fa fa-bath"></i> 2
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        beds <br>
                                        <i class="fa fa-bed"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        rooms <br>
                                        <i class="fa fa-inbox"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        area <br>
                                        <i class="fa fa-map"></i> 4300 sq ft
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="card__image-footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline my-auto">
                                <li class="list-inline-item">
                                    <a href="#">
                                        tom wilson <br>
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item">

                                    <h6>$350.000</h6>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <!-- TWO -->
                    <div class="card__image card__box">
                        <div class="card__image-header h-250">
                            <div class="ribbon text-capitalize">featured</div>
                            <img src="images/600x400.jpg" alt="" class="img-fluid w100 img-transition">
                            <div class="info"> for sale</div>
                        </div>
                        <div class="card__image-body">
                            <span class="badge badge-primary text-capitalize mb-2">house</span>
                            <h6 class="text-capitalize">
                                Ample Apartment At Last Floor
                            </h6>

                            <p class="text-capitalize">
                                <i class="fa fa-map-marker"></i>
                                west flaminggo road, las vegas
                            </p>
                            <ul class="list-inline card__content">
                                <li class="list-inline-item">

                                    <span>
                                        baths <br>
                                        <i class="fa fa-bath"></i> 2
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        beds <br>
                                        <i class="fa fa-bed"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        rooms <br>
                                        <i class="fa fa-inbox"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        area <br>
                                        <i class="fa fa-map"></i> 4300 sq ft
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="card__image-footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline my-auto">
                                <li class="list-inline-item">
                                    <a href="#">
                                        tom wilson <br>
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item">

                                    <h6>$350.000</h6>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <!-- THREE -->
                    <div class="card__image card__box">
                        <div class="card__image-header h-250">
                            <div class="ribbon text-capitalize">featured</div>
                            <img src="images/600x400.jpg" alt="" class="img-fluid w100 img-transition">
                            <div class="info"> for sale</div>
                        </div>
                        <div class="card__image-body">
                            <span class="badge badge-primary text-capitalize mb-2">house</span>
                            <h6 class="text-capitalize">
                                Contemporary Apartment
                            </h6>

                            <p class="text-capitalize">
                                <i class="fa fa-map-marker"></i>
                                west flaminggo road, las vegas
                            </p>
                            <ul class="list-inline card__content">
                                <li class="list-inline-item">

                                    <span>
                                        baths <br>
                                        <i class="fa fa-bath"></i> 2
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        beds <br>
                                        <i class="fa fa-bed"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        rooms <br>
                                        <i class="fa fa-inbox"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        area <br>
                                        <i class="fa fa-map"></i> 4300 sq ft
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="card__image-footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline my-auto">
                                <li class="list-inline-item">
                                    <a href="#">
                                        tom wilson <br>
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item">

                                    <h6>$350.000</h6>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <!-- FOUR -->
                    <div class="card__image card__box">
                        <div class="card__image-header h-250">
                            <div class="ribbon text-capitalize">featured</div>
                            <img src="images/600x400.jpg" alt="" class="img-fluid w100 img-transition">
                            <div class="info"> for sale</div>
                        </div>
                        <div class="card__image-body">
                            <span class="badge badge-primary text-capitalize mb-2">house</span>
                            <h6 class="text-capitalize">
                                Family Home For Sale
                            </h6>

                            <p class="text-capitalize">
                                <i class="fa fa-map-marker"></i>
                                west flaminggo road, las vegas
                            </p>
                            <ul class="list-inline card__content">
                                <li class="list-inline-item">

                                    <span>
                                        baths <br>
                                        <i class="fa fa-bath"></i> 2
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        beds <br>
                                        <i class="fa fa-bed"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        rooms <br>
                                        <i class="fa fa-inbox"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        area <br>
                                        <i class="fa fa-map"></i> 4300 sq ft
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="card__image-footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline my-auto">
                                <li class="list-inline-item">
                                    <a href="#">
                                        tom wilson <br>
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item">

                                    <h6>$350.000</h6>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <!-- FIVE -->
                    <div class="card__image card__box">
                        <div class="card__image-header h-250">
                            <div class="ribbon text-capitalize">featured</div>
                            <img src="images/600x400.jpg" alt="" class="img-fluid w100 img-transition">
                            <div class="info"> for sale</div>
                        </div>
                        <div class="card__image-body">
                            <span class="badge badge-primary text-capitalize mb-2">house</span>
                            <h6 class="text-capitalize">
                                184 Lexington Avenue
                            </h6>

                            <p class="text-capitalize">
                                <i class="fa fa-map-marker"></i>
                                west flaminggo road, las vegas
                            </p>
                            <ul class="list-inline card__content">
                                <li class="list-inline-item">

                                    <span>
                                        baths <br>
                                        <i class="fa fa-bath"></i> 2
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        beds <br>
                                        <i class="fa fa-bed"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        rooms <br>
                                        <i class="fa fa-inbox"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        area <br>
                                        <i class="fa fa-map"></i> 4300 sq ft
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="card__image-footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline my-auto">
                                <li class="list-inline-item">
                                    <a href="#">
                                        tom wilson <br>
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item">

                                    <h6>$350.000</h6>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <!-- SIX -->
                    <div class="card__image card__box">
                        <div class="card__image-header h-250">
                            <div class="ribbon text-capitalize">featured</div>
                            <img src="images/600x400.jpg" alt="" class="img-fluid w100 img-transition">
                            <div class="info"> for sale</div>
                        </div>
                        <div class="card__image-body">
                            <span class="badge badge-primary text-capitalize mb-2">house</span>
                            <h6 class="text-capitalize">
                                Luxury Villa With Pool
                            </h6>

                            <p class="text-capitalize">
                                <i class="fa fa-map-marker"></i>
                                west flaminggo road, las vegas
                            </p>
                            <ul class="list-inline card__content">
                                <li class="list-inline-item">

                                    <span>
                                        baths <br>
                                        <i class="fa fa-bath"></i> 2
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        beds <br>
                                        <i class="fa fa-bed"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        rooms <br>
                                        <i class="fa fa-inbox"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        area <br>
                                        <i class="fa fa-map"></i> 4300 sq ft
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="card__image-footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline my-auto">
                                <li class="list-inline-item">
                                    <a href="#">
                                        tom wilson <br>
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item">

                                    <h6>$350.000</h6>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <div class="card__image card__box">
                        <div class="card__image-header h-250">
                            <div class="ribbon text-capitalize">featured</div>
                            <img src="images/600x400.jpg" alt="" class="img-fluid w100 img-transition">
                            <div class="info"> for sale</div>
                        </div>
                        <div class="card__image-body">
                            <span class="badge badge-primary text-capitalize mb-2">house</span>
                            <h6 class="text-capitalize">
                                The Citizen Apartment 5th Floor
                            </h6>

                            <p class="text-capitalize">
                                <i class="fa fa-map-marker"></i>
                                west flaminggo road, las vegas
                            </p>
                            <ul class="list-inline card__content">
                                <li class="list-inline-item">

                                    <span>
                                        baths <br>
                                        <i class="fa fa-bath"></i> 2
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        beds <br>
                                        <i class="fa fa-bed"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        rooms <br>
                                        <i class="fa fa-inbox"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        area <br>
                                        <i class="fa fa-map"></i> 4300 sq ft
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="card__image-footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline my-auto">
                                <li class="list-inline-item">
                                    <a href="#">
                                        tom wilson <br>
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item">

                                    <h6>$350.000</h6>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="item">
                    <!-- SEVEN -->
                    <div class="card__image card__box">
                        <div class="card__image-header h-250">
                            <div class="ribbon text-capitalize">featured</div>
                            <img src="images/600x400.jpg" alt="" class="img-fluid w100 img-transition">
                            <div class="info"> for sale</div>
                        </div>
                        <div class="card__image-body">
                            <span class="badge badge-primary text-capitalize mb-2">house</span>
                            <h6 class="text-capitalize">
                                Family Home For Sale
                            </h6>

                            <p class="text-capitalize">
                                <i class="fa fa-map-marker"></i>
                                west flaminggo road, las vegas
                            </p>
                            <ul class="list-inline card__content">
                                <li class="list-inline-item">

                                    <span>
                                        baths <br>
                                        <i class="fa fa-bath"></i> 2
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        beds <br>
                                        <i class="fa fa-bed"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        rooms <br>
                                        <i class="fa fa-inbox"></i> 3
                                    </span>
                                </li>
                                <li class="list-inline-item">
                                    <span>
                                        area <br>
                                        <i class="fa fa-map"></i> 4300 sq ft
                                    </span>
                                </li>
                            </ul>
                        </div>
                        <div class="card__image-footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline my-auto">
                                <li class="list-inline-item">
                                    <a href="#">
                                        tom wilson
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item">

                                    <h6>$350.000</h6>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END RECENT PROPERTY -->




    <!-- MOST POPULAR PLACES -->
    <section class="wrap__heading ">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <div class="title__head">
                        <h2 class="text-center text-capitalize">
                            most popular places
                        </h2>
                        <p class="text-center text-capitalize">find properties in these cities.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-lg-5 col-xl-5 col-padd">
                    <!-- CARD IMAGE -->

                    <a href="#">
                        <div class="card__image-hover-style-v3">
                            <div class="card__image-hover-style-v3-thumb h-475">
                                <img src="images/700x980.jpg" alt="" class="img-fluid w-100">
                            </div>
                            <div class="overlay">
                                <div class="desc">
                                    <h6 class="text-capitalize">tokyo</h6>
                                    <p class="text-capitalize">70 properties</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-7 col-xl-7">
                    <div class="row">
                        <div class="col-md-6 col-padd">
                            <!-- CARD IMAGE -->
                            <a href="#">
                                <div class="card__image-hover-style-v3">
                                    <div class="card__image-hover-style-v3-thumb h-230">
                                        <img src="images/600x400.jpg" alt="" class="img-fluid w-100">
                                    </div>
                                    <div class="overlay">
                                        <div class="desc">
                                            <h6 class="text-capitalize">australia</h6>
                                            <p class="text-capitalize">70 properties</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-padd">
                            <!-- CARD IMAGE -->
                            <a href="#">
                                <div class="card__image-hover-style-v3">
                                    <div class="card__image-hover-style-v3-thumb h-230">
                                        <img src="images/600x400.jpg" alt="" class="img-fluid w-100">
                                    </div>
                                    <div class="overlay">
                                        <div class="desc">
                                            <h6 class="text-capitalize">rome</h6>
                                            <p class="text-capitalize">70 properties</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-padd">
                            <!-- CARD IMAGE -->
                            <a href="#">
                                <div class="card__image-hover-style-v3">
                                    <div class="card__image-hover-style-v3-thumb h-230">
                                        <img src="images/600x400.jpg" alt="" class="img-fluid w-100">
                                    </div>
                                    <div class="overlay">
                                        <div class="desc">
                                            <h6 class="text-capitalize">new york</h6>
                                            <p class="text-capitalize">70 properties</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-6 col-padd">
                            <!-- CARD IMAGE -->
                            <a href="#">
                                <div class="card__image-hover-style-v3">
                                    <div class="card__image-hover-style-v3-thumb h-230">
                                        <img src="images/600x400.jpg" alt="" class="img-fluid w-100">
                                    </div>
                                    <div class="overlay">
                                        <div class="desc">
                                            <h6 class="text-capitalize">london</h6>
                                            <p class="text-capitalize">70 properties</p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END MOST POPULAR PLACES -->




    <!-- ABOUT -->
    <section class="home__about bg-theme-v4">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <div class="title__leading">
                        <!-- <h6 class="text-uppercase">trusted By thousands</h6> -->
                        <h2 class="text-capitalize"> why choose use?</h2>
                        <p>
                            The first step in selling your property is to get a valuation from local experts. They will
                            inspect your home and take into account its unique features, the area and market conditions
                            before providing you with the most accurate valuation.
                        </p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quod libero amet, laborum qui nulla
                            quae alias tempora. Placeat voluptatem eum numquam quas distinctio obcaecati quaerat,
                            repudiandae qui! Quia, omnis, doloribus! Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit. Quod libero amet, laborum qui nullas tempora.</p>

                        <a href="#" class="btn btn-primary mt-3 text-capitalize"> read more
                            <i class="fa fa-angle-right ml-3 "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- OUR PARTNERS -->
    <section class="projects__partner bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6">
                    <div class="title__head">
                        <h2 class="text-center text-capitalize">our partners</h2>
                        <p class="text-center text-capitalize">brand partners successful projects trusted many clients
                            real estate </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="projects__partner-logo">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item">
                                <img src="images/partner-logo6.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo7.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo8.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo1.png" alt="" class="img-fluid">
                            </li>
                            <li class="list-inline-item">
                                <img src="images/partner-logo5.png" alt="" class="img-fluid">
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END OUR PARTNERS -->

    <!-- TESTIMONIAL -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <div class="title__head">
                        <h2 class="text-center text-capitalize">
                            what people says
                        </h2>
                        <p class="text-center text-capitalize">people says about walls property.</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="testimonial owl-carousel owl-theme">
                <!-- TESTIMONIAL -->
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL -->
                <!-- TESTIMONIAL -->
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL -->
                <!-- TESTIMONIAL -->
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL -->
                <!-- TESTIMONIAL -->
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL -->
                <!-- TESTIMONIAL -->
                <div class="item testimonial__block">
                    <div class="testimonial__block-card bg-reviews">
                        <p>
                            Thank you walls property help me, choice dream home We were impressed with the build
                            quality, Plus they are competitively priced.
                        </p>
                    </div>
                    <div class="testimonial__block-users">
                        <div class="testimonial__block-users-img">
                            <img src="images/80x80.jpg" alt="" class="img-fluid">
                        </div>
                        <div class="testimonial__block-users-name">
                            jhon doe <br>
                            <span>owner, digital agency</span>
                        </div>
                    </div>
                </div>
                <!-- END TESTIMONIAL -->

            </div>
        </div>
    </section>
    <!-- END TESTIMONIAL -->

    <!-- CALL TO ACTION -->
    <section class="bg-theme-v1">
        <div class="cta">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-12 col-lg-12 text-center">
                        <h2 class="text-uppercase text-white">signup & build your dream house</h2>
                        <p class="text-capitalize text-white">We'll help you to grow your career and growth, please
                            contact
                            team
                            walls real estate and get this offer promo</p>
                        <a href="#" class="btn btn-primary text-uppercase ">request a quote
                            <i class="fa fa-angle-right ml-3 arrow-btn "></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- BLOG -->
    <section class="blog__home">
        <div class="container">
            <div class="row">
                <div class="col-md-8 col-lg-6 mx-auto">
                    <div class="title__head">
                        <h2 class="text-center text-capitalize">
                            lastest news
                        </h2>
                        <p class="text-center text-capitalize">find of the most popular real estate company all around
                            indonesia. </p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <!-- BLOG  -->
                    <div class="card__image">
                        <div class="card__image-header h-250">
                            <img src="images/500x400.jpg" alt="" class="img-fluid w100 img-transition">
                            <div class="info"> event</div>
                        </div>
                        <div class="card__image-body">
                            <!-- <span class="badge badge-secondary p-1 text-capitalize mb-3">May 08, 2019 </span> -->
                            <h6 class="text-capitalize">
                                <a href="/blog-single.html">Best Interior Oppertunity </a>
                            </h6>
                            <p class=" mb-0">
                                Real estate festival is one of the famous feval for explain to you how all this mistaolt
                                deand praising pain
                                wasnad I will give complete

                            </p>


                        </div>
                        <div class="card__image-footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline my-auto">
                                <li class="list-inline-item ">
                                    <a href="#">
                                        tom wilson
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item ">
                                    <a href="/blog-single.html" class="btn btn-sm btn-primary "><small
                                            class="text-white ">read more <i
                                                class="fa fa-angle-right ml-1"></i></small></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- END BLOG -->
                </div>
                <div class="col-md-4">
                    <!-- BLOG  -->
                    <div class="card__image">
                        <div class="card__image-header h-250">
                            <img src="images/500x400.jpg" alt="" class="img-fluid w100 img-transition">
                            <div class="info"> event</div>
                        </div>
                        <div class="card__image-body">
                            <!-- <span class="badge badge-secondary p-1 text-capitalize mb-3">May 08, 2019 </span> -->
                            <h6 class="text-capitalize">
                                <a href="/blog-single.html">Tips & Trick buy real estate </a>
                            </h6>
                            <p class=" mb-0">
                                Real estate festival is one of the famous feval for explain to you how all this mistaolt
                                deand praising pain
                                wasnad I will give complete

                            </p>


                        </div>
                        <div class="card__image-footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline my-auto">
                                <li class="list-inline-item">
                                    <a href="/blog-single.html">
                                        tom wilson
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item">
                                    <a href="/blog-single.html" class="btn btn-sm btn-primary "><small
                                            class="text-white ">read more <i
                                                class="fa fa-angle-right ml-1"></i></small></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- END BLOG -->
                </div>
                <div class="col-md-4">
                    <!-- BLOG  -->
                    <div class="card__image">
                        <div class="card__image-header h-250">
                            <img src="images/500x400.jpg" alt="" class="img-fluid w100 img-transition">
                            <div class="info"> event</div>
                        </div>
                        <div class="card__image-body">
                            <!-- <span class="badge badge-secondary p-1 text-capitalize mb-3">May 08, 2019 </span> -->
                            <h6 class="text-capitalize">
                                <a href="/blog-single.html">Our Must Popular Deluxe House </a>
                            </h6>
                            <p class=" mb-0">
                                Real estate festival is one of the famous feval for explain to you how all this mistaolt
                                deand praising pain
                                wasnad I will give complete

                            </p>


                        </div>
                        <div class="card__image-footer">
                            <figure>
                                <img src="images/80x80.jpg" alt="" class="img-fluid rounded-circle">
                            </figure>
                            <ul class="list-inline  my-auto">
                                <li class="list-inline-item">
                                    <a href="/blog-single.html">
                                        tom wilson
                                    </a>

                                </li>

                            </ul>
                            <ul class="list-inline my-auto ml-auto">
                                <li class="list-inline-item ">
                                    <a href="/blog-single.html" class="btn btn-sm btn-primary "><small
                                            class="text-white ">read more <i
                                                class="fa fa-angle-right ml-1"></i></small></a>
                                </li>

                            </ul>
                        </div>
                    </div>
                    <!-- END BLOG -->
                </div>
            </div>
        </div>
    </section>
    <!-- END BLOG -->
    @include('layouts.inc.frontend.footer')

    <!-- SCROLL TO TOP -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TO TOP -->
    <script src="{{ asset('assets/js/index.bundle.js') }}"></script>
</body>

</html>
