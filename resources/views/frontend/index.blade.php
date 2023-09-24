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
    @vite(['resources/js/app.js'])

</head>

<body>
    @include("layouts.inc.frontend.navbar-top")
    <!-- HEADER -->
    <header class="jumbotron bg-theme">
        <div class="bg-overlay"></div>
        @include("layouts.inc.frontend.navbar", ['transparent' => true])
        <!-- HERO -->
        <div class="wrap__intro d-flex align-items-md-center ">
            <div class="container  ">
                <div class="row align-items-center justify-content-start flex-wrap">
                    <div class="col-md-10 mx-auto">
                        <div class="wrap__intro-heading text-center" data-aos="fade-up">
                            <!-- <h4>the walls property</h4> -->
                            <h1>
                                Temukan Rumah Impian Anda </h1>
                            <p>Your Property, Our Priority and From as low as $10 per day with limited time offer
                                discounts</p>

                            <!-- SEARCH BAR -->
                            <div class="wrapper__section">
                                <div class="wrapper__section__components">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <form class=" search__container" method="GET" action="{{route("frontend.property.index")}}">
                                                <div class="row input-group no-gutters">
                                                    <div class="col-sm-12 col-md-9">
                                                        <input type="text" class="form-control"
                                                            aria-label="Text input" name="search" placeholder="Cari properti atau agen">
                                                    </div>

                                                    <div class="col-sm-12 col-md-3 input-group-append">
                                                        <button type="submit" class="btn btn-primary btn-block" type="submit">
                                                            <i class="fa fa-search"></i> <span
                                                                class="ml-1 text-uppercase">Search</span>
                                                        </button>

                                                    </div>
                                                </div>
                                            </form>
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
                        @foreach ($featuredProperties as $property)
                            <div class="item">
                                <!-- ONE -->
                                <div class="card__image card__box">
                                    <div class="card__image-header h-250">
                                        <div class="ribbon text-capitalize">featured</div>
                                        <a href="{{route("frontend.property.view", $property->slug)}}">
                                            <img src="{{ asset($property->propertyImages[0]->image) }}" alt=""
                                                class="img-fluid w100 img-transition">
                                        </a>
                                        <div class="info"> {{ $property->for === 0 ? 'dijual' : 'disewakan' }}</div>

                                    </div>
                                    <div class="card__image-body">
                                        <span
                                            class="badge badge-primary text-capitalize mb-2">{{ $property->category->name }}
                                        </span>
                                        <a href="{{route("frontend.property.view", $property->slug)}}">
                                            <h6 class="text-capitalize">
                                                {{ $property->name }}
                                            </h6>
                                        </a>

                                        <p class="text-capitalize">
                                            <i class="fa fa-map-marker"></i>
                                            {{ $property->location->subdistrict_name }}
                                        </p>
                                        <ul class="list-inline card__content">
                                            <li class="list-inline-item">

                                                <span>
                                                    baths <br>
                                                    <i class="fa fa-bath"></i> {{ $property->bathrooms }}
                                                </span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    beds <br>
                                                    <i class="fa fa-bed"></i> {{ $property->bedrooms }}
                                                </span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    rooms <br>
                                                    <i class="fa fa-inbox"></i> {{ $property->rooms }}
                                                </span>
                                            </li>
                                            <li class="list-inline-item">
                                                <span>
                                                    area <br>
                                                    <i class="fa fa-map"></i> {{ $property->size }}
                                                </span>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="card__image-footer">
                                        <figure>
                                            <img src="{{asset($property->agent->image ?? "assets/images/80x80.jpg")}}" alt=""
                                                class="img-fluid rounded-circle">
                                        </figure>
                                        <ul class="list-inline my-auto">
                                            <li class="list-inline-item">
                                                <a href="#">
                                                    {{ $property->agent->name }} <br>
                                                </a>

                                            </li>

                                        </ul>
                                        <ul class="list-inline my-auto ml-auto">
                                            <li class="list-inline-item ">
                                                <h6>{{ rupiah($property->price) }}</h6>
                                            </li>

                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
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
                            Properti Terbaru
                        </h2>
                        <p class="text-center text-capitalize">We provide full service at every step.</p>

                    </div>
                </div>
            </div>
            <div class="featured__property-carousel owl-carousel owl-theme">
                @foreach ($recentProperties as $property)
                    <div class="item">
                        <!-- ONE -->
                        <div class="card__image card__box">
                            <div class="card__image-header h-250">
                                
                                @if ($property->isFeatured === 1 && $property->status === 1)
                                    <div class="ribbon text-capitalize">featured</div>
                                @elseif($property->status === 0)
                                    <div class="ribbon-danger text-capitalize">soldout</div>
                                @endif
                                <a href="{{route("frontend.property.view", $property->slug)}}">
                                    <img src="{{ asset($property->propertyImages[0]->image) }}" alt=""
                                        class="img-fluid w100 img-transition">
                                </a>

                                <div class="info">{{ $property->for === 0 ? 'dijual' : 'disewakan' }}</div>

                            </div>
                            <div class="card__image-body">
                                <span
                                    class="badge badge-primary text-capitalize mb-2">{{ $property->category->name }}</span>
                                    <a href="{{route("frontend.property.view", $property->slug)}}">

                                        <h6 class="text-capitalize">
                                            {{ $property->name }}
                                        </h6>
                                    </a>

                                <p class="text-capitalize">
                                    <i class="fa fa-map-marker"></i>
                                    {{ $property->location->subdistrict_name }}
                                </p>
                                <ul class="list-inline card__content">
                                    <li class="list-inline-item">

                                        <span>
                                            baths <br>
                                            <i class="fa fa-bath"></i> {{ $property->bathrooms }}
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span>
                                            beds <br>
                                            <i class="fa fa-bed"></i> {{ $property->bedrooms }}
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span>
                                            rooms <br>
                                            <i class="fa fa-inbox"></i> {{ $property->rooms }}
                                        </span>
                                    </li>
                                    <li class="list-inline-item">
                                        <span>
                                            area <br>
                                            <i class="fa fa-map"></i> {{ $property->size }}
                                        </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="card__image-footer">
                                <figure>
                                    <img src="{{ asset('assets/images/80x80.jpg') }}" alt=""
                                        class="img-fluid rounded-circle">
                                </figure>
                                <ul class="list-inline my-auto">
                                    <li class="list-inline-item">
                                        <a href="#">
                                            {{ $property->agent->name }} <br>
                                        </a>

                                    </li>

                                </ul>
                                <ul class="list-inline my-auto ml-auto">
                                    <li class="list-inline-item ">
                                        <h6>{{ rupiah($property->price) }}</h6>
                                    </li>

                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <!-- END RECENT PROPERTY -->


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



    @include('layouts.inc.frontend.footer')

    <!-- SCROLL TO TOP -->
    <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TO TOP -->
    <script src="{{ asset('assets/js/index.bundle.js') }}"></script>
</body>

</html>
