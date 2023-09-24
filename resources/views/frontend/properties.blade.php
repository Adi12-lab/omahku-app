@extends('layouts.app')
@section('content')
    {{ Breadcrumbs::render('property') }}
    <!-- LISTING LIST -->
    <section>
        <div class="container">
            <div class="row">

                <div class="col-12">
                    <div class=" search__container">
                        <form class="row input-group no-gutters" method="GET" action="{{ route('frontend.property.index') }}">
                            <div class="col-sm-12 col-md-9">
                                <input type="text" class="form-control border" name="search" aria-label="Text input" placeholder="Cari properti atau agen" value="{{request("search")}}">
                            </div>
    
                            <div class="col-sm-12 col-md-3 input-group-append">
                                <button class="btn btn-primary btn-block" type="submit">
                                    <i class="fa fa-search"></i> <span class="ml-1 text-uppercase">Search</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row mt-4">
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="tabs__custom-v2">
                                <!-- FILTER VERTICAL -->
                                <ul class="nav nav-pills myTab" role="tablist">
                                    <li class="list-inline-item mr-auto">
                                        <span class="title-text">Sort by</span>
                                        <div class="btn-group">
                                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown"
                                                aria-haspopup="true" aria-expanded="false">
                                                Nama Properti
                                            </a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item property-control" data-sort="name:asc">Nama
                                                    Properti</a>
                                                <a class="dropdown-item property-control" data-sort="price:asc">Harga
                                                    Termurah</a>
                                                <a class="dropdown-item property-control" data-sort="price:desc">Harga
                                                    Tertinggi</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active pills-tab-one" data-toggle="pill" href="#pills-tab-one"
                                            role="tab" aria-controls="pills-tab-one" aria-selected="true">
                                            <span class="fa fa-th-list"></span>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link pills-tab-two" data-toggle="pill" href="#pills-tab-two"
                                            role="tab" aria-controls="pills-tab-two" aria-selected="false">
                                            <span class="fa fa-th-large"></span></a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="pills-tab-one" role="tabpanel"
                                        aria-labelledby="pills-tab-one">
                                        <div class="row container-mix-1">
                                            @foreach ($properties as $property)
                                                <div class="col-lg-12 property-item" data-price="{{ $property->price }}"
                                                    data-name="{{ $property->name }}">
                                                    <div class="card__image card__box-v1">
                                                        <div class="row no-gutters">
                                                            <div class="col-md-4 col-lg-3 col-xl-4">
                                                                <div class="card__image__header h-250">
                                                                    <a href="#">
                                                                        @if ($property->isFeatured === 1 && $property->status === 1)
                                                                            <div class="ribbon text-capitalize">featured
                                                                            </div>
                                                                        @elseif($property->status === 0)
                                                                            <div class="ribbon-danger text-capitalize">
                                                                                soldout</div>
                                                                        @endif
                                                                        <img src="{{ asset($property->propertyImages[0]->image) }}"
                                                                            alt=""
                                                                            class="img-fluid w100 img-transition">
                                                                        <div class="info">
                                                                            {{ $property->for === 1 ? 'disewakan' : 'dijual' }}
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4 col-lg-6 col-xl-5 my-auto">
                                                                <div class="card__image__body">

                                                                    <span
                                                                        class="badge badge-primary text-capitalize mb-2">{{ $property->category->name }}</span>
                                                                    <h6>
                                                                        <a
                                                                            href="{{ route('frontend.property.view', $property->slug) }}">{{ $property->name }}</a>
                                                                    </h6>
                                                                    <div class="card__image__body-desc">
                                                                        <p class="text-capitalize">
                                                                            {{ $property->small_description }}
                                                                        </p>
                                                                        <p class="text-capitalize">
                                                                            <i class="fa fa-map-marker"></i>
                                                                            {{ $property->location->subdistrict_name }}
                                                                        </p>
                                                                    </div>

                                                                    <ul class="list-inline card__content">
                                                                        <li class="list-inline-item">

                                                                            <span>
                                                                                baths <br>
                                                                                <i class="fa fa-bath"></i>
                                                                                {{ $property->bathrooms }}
                                                                            </span>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <span>
                                                                                beds <br>
                                                                                <i class="fa fa-bed"></i>
                                                                                {{ $property->bedrooms }}
                                                                            </span>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <span>
                                                                                rooms <br>
                                                                                <i class="fa fa-inbox"></i>
                                                                                {{ $property->rooms }}
                                                                            </span>
                                                                        </li>
                                                                        <li class="list-inline-item">
                                                                            <span>
                                                                                area <br>
                                                                                <i class="fa fa-map"></i>
                                                                                {{ $property->size }}
                                                                            </span>
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                            <div
                                                                class="col-md-4 col-lg-3 col-xl-3 my-auto card__image__footer-first">
                                                                <div class="card__image__footer">
                                                                    <figure>
                                                                        <img src="{{ asset($property->agent->image ?? 'assets/images/80x80.jpg') }}"
                                                                            alt="" class="img-fluid rounded-circle">
                                                                    </figure>
                                                                    <ul class="list-inline my-auto">
                                                                        <li class="list-inline-item name">
                                                                            <a href="#">
                                                                                {{ $property->agent->name }}
                                                                            </a>

                                                                        </li>


                                                                    </ul>
                                                                    <ul class="list-inline my-auto ml-auto price">
                                                                        <li class="list-inline-item ">

                                                                            <h6>{{ rupiah($property->price) }}</h6>
                                                                        </li>

                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="tab-pane fade" id="pills-tab-two" role="tabpanel"
                                        aria-labelledby="pills-tab-two">

                                        <div class="row container-mix-2">
                                            @foreach ($properties as $property)
                                                <div class="col-md-6 col-lg-6 property-item"
                                                    data-price="{{ $property->price }}"
                                                    data-name="{{ $property->name }}">
                                                    <div class="card__image card__box-v1">
                                                        <div class="card__image-header h-250">
                                                            @if ($property->isFeatured === 1 && $property->status === 1)
                                                                <div class="ribbon text-capitalize">featured
                                                                </div>
                                                            @elseif($property->status === 0)
                                                                <div class="ribbon-danger text-capitalize">
                                                                    soldout</div>
                                                            @endif
                                                            <img src="{{ asset($property->propertyImages[0]->image ?? 'assets/images/600x400.jpg') }}"
                                                                alt="" class="img-fluid w100 img-transition">
                                                            <div class="info">
                                                                {{ $property->for === 1 ? 'disewakan' : 'dijual' }}
                                                            </div>
                                                        </div>
                                                        <div class="card__image-body">
                                                            <span
                                                                class="badge badge-primary text-capitalize mb-2">{{ $property->category->name }}</span>
                                                            <h6 class="text-capitalize">
                                                                {{ $property->name }}
                                                            </h6>

                                                            <p class="text-capitalize">
                                                                <i class="fa fa-map-marker"></i>
                                                                {{ $property->location->subdistrict_name }}
                                                            </p>
                                                            <ul class="list-inline card__content">
                                                                <li class="list-inline-item">

                                                                    <span>
                                                                        baths <br>
                                                                        <i class="fa fa-bath"></i>
                                                                        {{ $property->bathrooms }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        beds <br>
                                                                        <i class="fa fa-bed"></i>
                                                                        {{ $property->bedrooms }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        rooms <br>
                                                                        <i class="fa fa-inbox"></i>
                                                                        {{ $property->rooms }}
                                                                    </span>
                                                                </li>
                                                                <li class="list-inline-item">
                                                                    <span>
                                                                        area <br>
                                                                        <i class="fa fa-map"></i>
                                                                        {{ $property->size }}
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <div class="card__image-footer">
                                                            <figure>
                                                                <img src="{{ asset($property->agent->image ?? 'assets/images/80x80.jpg') }}"
                                                                    alt="" class="img-fluid rounded-circle">
                                                            </figure>
                                                            <ul class="list-inline my-auto">
                                                                <li class="list-inline-item ">
                                                                    <a href="#">
                                                                        {{ $property->agent->name }}
                                                                    </a>

                                                                </li>

                                                            </ul>
                                                            <ul class="list-inline my-auto ml-auto">
                                                                <li class="list-inline-item">

                                                                    <h6>{{ rupiah($property->price) }}</h6>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                        <div class="cleafix"></div>
                                    </div>

                                </div>
                                <!-- END FILTER VERTICAL -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="sticky-top">
                        <!-- FORM FILTER -->
                        <div class="products__filter mb-30">
                            <form class="products__filter__group" action="{{ route('frontend.property.index') }}"
                                method="POST">
                                @csrf

                                <div class="products__filter__header">

                                    <h5 class="text-center text-capitalize">filter properti</h5>
                                </div>
                                <div class="products__filter__body">
                                    <div class="form-group">

                                        <select class="wide select_option" name="for">
                                            <option data-display="Status Properti" value="">Status Properti</option>
                                            <option value="0" {{ session()->get('for') === 0 ? 'selected' : '' }}>
                                                Dijual</option>
                                            <option value="1" {{ session()->get('for') === 1 ? 'selected' : '' }}>
                                                Disewakan</option>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="wide select_option" name="category_id">
                                            <option data-display="Kategori" value="">Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ session()->get('category_id') === $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="wide select_option" name="size">
                                            <option data-display="Luas" value="">Luas</option>
                                            <option value="100" {{ session('size') === 100 ? 'selected' : '' }}>&le;
                                                100 m&#x00B2; </option>
                                            <option value="300" {{ session('size') === 300 ? 'selected' : '' }}>&le;
                                                300 m&#x00B2; </option>
                                            <option value="600" {{ session('size') === 600 ? 'selected' : '' }}>&le;
                                                600 m&#x00B2; </option>
                                            <option value="900" {{ session('size') === 900 ? 'selected' : '' }}>&le;
                                                900 m&#x00B2; </option>
                                            <option value="1200" {{ session('size') === 1200 ? 'selected' : '' }}>&le;
                                                1200 m&#x00B2; </option>
                                            <option value="1500" {{ session('size') === 1500 ? 'selected' : '' }}>&le;
                                                1500 m&#x00B2; </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="wide select_option" name="subdistrict_id">
                                            <option data-display="Lokasi" value="">Lokasi</option>
                                            @foreach ($locations as $location)
                                                <option value="{{ $location->subdistrict_id }}"
                                                    {{ session()->get('subdistrict_id') === $location->subdistrict_id ? 'selected' : '' }}>
                                                    {{ $location->subdistrict_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select class="wide select_option" name="bedrooms">
                                            <option data-display="Kamar Tidur" value="">Kamar Tidur</option>
                                            @for ($i = 1; $i <= 8; $i++)
                                                <option value="{{ $i }}"
                                                    {{ session('bedrooms') === $i ? 'selected' : '' }}>{{ $i }}
                                                </option>
                                            @endfor
                                            <option value="1000">&ge; 8</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-group">
                                            <select class="wide select_option" name="bathrooms">
                                                <option data-display="Kamar Mandi" value="">Kamar Mandi</option>
                                                @for ($i = 1; $i <= 8; $i++)
                                                    <option value="{{ $i }}"
                                                        {{ session('bathrooms') === $i ? 'selected' : '' }}>
                                                        {{ $i }}</option>
                                                @endfor
                                                <option value="1000"
                                                    {{ session('bathrooms') === 1000 ? 'selected' : '' }}>&ge; 8</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="mb-3">Rentang Harga</label>
                                        <div class="filter__price">
                                            <input class="price-range" type="text" name="price_range"
                                                data-type="double" data-min="0" data-max="5e9"
                                                data-prettify-separator="."
                                                data-from="{{ session('rangeMinPrice') ?? $minPrice }}"
                                                data-to="{{ session('rangeMaxPrice') ?? $maxPrice }}"
                                                data-prefix="Rp " />
                                        </div>
                                    </div>

                                    <div class="form-group mb-0 mt-2">

                                        <a class="btn btn-outline-primary btn-block text-capitalize advanced-filter"
                                            data-toggle="collapse" href="#multiCollapseExample1"
                                            aria-controls="multiCollapseExample1"><i class="fa fa-plus-circle"></i>
                                            filter
                                            lanjutan
                                        </a>

                                        <div class="collapse multi-collapse" id="multiCollapseExample1">
                                            <div class="advancedfilter">
                                                @foreach ($features as $feature)
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="feature{{ $loop->iteration }}" type="checkbox"
                                                            name="feature[]" value="{{ $feature->id }}"
                                                            @if (session('features') !== null) {{ is_int(array_search($feature->id, session('features'))) ? 'checked' : '' }} @endif>
                                                        <label for="feature{{ $loop->iteration }}"
                                                            class="label-brand text-capitalize">
                                                            {{ $feature->name }}
                                                        </label>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="products__filter__footer">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary text-capitalize btn-block"><i
                                                class="fa fa-search ml-1"></i>
                                            Cari Properti
                                        </button>

                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- END FORM FILTER -->
                        <!-- ARCHIVE CATEGORY -->
                        <div class=" wrapper__list__category">
                            <!-- CATEGORY -->
                            <div class="widget widget__archive">
                                <div class="widget__title">
                                    <h5 class="text-dark mb-0 text-center">Kategori Properti</h5>
                                </div>
                                <ul class="list-unstyled">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="#" class="text-capitalize">
                                                {{ $category->name }}
                                                <span class="badge badge-primary">{{ $category->property_count }}</span>
                                            </a>
                                        </li>
                                    @endforeach

                                </ul>
                            </div>
                            <!-- END CATEGORY -->
                        </div>
                        <!-- End ARCHIVE CATEGORY -->

                    </div>
                </div>

                <div class="col-lg-12 mt-4">
                    {{ $properties->links() }}
                </div>
            </div>
        </div>
    </section>
    <!-- END LISTING LIST -->
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/mixitup.min.js') }}"></script>
    <script>
        var containerEl1 = document.querySelector('.container-mix-1');
        var mixer1 = mixitup(containerEl1, {
            selectors: {
                target: ".property-item"
            },
            load: {
                sort: "name:asc"
            },
            controls: {
                scope: 'local'
            }
        });

        var containerEl2 = document.querySelector('.container-mix-2');
        var mixer2 = mixitup(containerEl2, {
            selectors: {
                target: ".property-item"
            },
            load: {
                sort: "name:asc"
            },
            controls: {
                scope: 'local'
            }
        });

        // Select all controls
        var controls = $('.property-control');
        controls.each(function() {
            $(this).on('click', function() {
                var sortOrder = $(this).attr('data-sort');
                $(this).parents(".btn-group").children(".dropdown-toggle").text($(this).text());
                mixer1.sort(sortOrder);
                mixer2.sort(sortOrder);
            });
        });
    </script>
@endsection
