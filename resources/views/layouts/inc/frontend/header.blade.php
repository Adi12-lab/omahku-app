    <!-- HEADER -->
    <header>
        @include("layouts.inc.frontend.navbar-top")
       
        @include("layouts.inc.frontend.navbar")

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
