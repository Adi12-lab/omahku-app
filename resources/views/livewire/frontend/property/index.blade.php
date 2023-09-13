    <div>
        {{ Breadcrumbs::render('property') }}
        <!-- LISTING LIST -->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="tabs__custom-v2">
                                    <!-- FILTER VERTICAL -->
                                    <ul class="nav nav-pills myTab" role="tablist">
                                        <li class="list-inline-item mr-auto">
                                            <span class="title-text">Sort by</span>
                                            <div class="btn-group">
                                                <a href="javascript:void(0)" class="dropdown-toggle"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Based Properties
                                                </a>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" href="javascript:void(0)">Low to High
                                                        Price</a>
                                                    <a class="dropdown-item" href="javascript:void(0)">High to Low Price
                                                    </a>
                                                    <a class="dropdown-item" href="javascript:void(0)">Sell
                                                        Properties</a>

                                                    <a class="dropdown-item" href="javascript:void(0)">Rent
                                                        Properties</a>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link active pills-tab-one" data-toggle="pill"
                                                href="#pills-tab-one" role="tab" aria-controls="pills-tab-one"
                                                aria-selected="true">
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
                                            @foreach ($properties as $property)
                                                <div class="row" wire:key="{{ str()->random(10) }}">
                                                    <div class="col-lg-12">
                                                        <div class="card__image card__box-v1">
                                                            <div class="row no-gutters">
                                                                <div class="col-md-4 col-lg-3 col-xl-4">
                                                                    <div class="card__image__header h-250">
                                                                        <a href="#">
                                                                            @if ($property->isFeatured === 1 && $property->status === 1)
                                                                                <div class="ribbon text-capitalize">
                                                                                    featured
                                                                                </div>
                                                                            @elseif($property->status === 0)
                                                                                <div
                                                                                    class="ribbon-danger text-capitalize">
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
                                                                            <a href="#">{{ $property->name }}</a>
                                                                        </h6>
                                                                        <div class="card__image__body-desc">
                                                                            <p class="text-capitalize">
                                                                                Lorem ipsum dolor sit amet consectetur
                                                                                adipisicing
                                                                                elit. Libero, alias!
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
                                                                                alt=""
                                                                                class="img-fluid rounded-circle">
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

                                                </div>
                                            @endforeach

                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="tab-pane fade" id="pills-tab-two" role="tabpanel"
                                            aria-labelledby="pills-tab-two">
                                            @php
                                                $chunkProperties = array_chunk($properties->all(), 2);
                                            @endphp
                                            @foreach ($chunkProperties as $chunkItem)
                                                <div class="row" wire:key="{{ str()->random(10) }}">
                                                    @foreach ($chunkItem as $property)
                                                        <div class="col-md-6 col-lg-6">
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
                                                                        alt=""
                                                                        class="img-fluid w100 img-transition">
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
                                                                            alt=""
                                                                            class="img-fluid rounded-circle">
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
                                            @endforeach

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
                                <form class="products__filter__group" wire:submit="filter">
                                    <div class="products__filter__header">

                                        <h5 class="text-center text-capitalize">filter properti</h5>
                                    </div>
                                    <div class="products__filter__body">
                                        <d class="form-group">

                                            <select class="wide select_option">
                                                <option data-display="Property Status">Property Status</option>
                                                <option>For Sale</option>
                                                <option>For Rent</option>

                                            </select>
                                        </d>
                                        <div class="form-group">
                                            <select class="wide select_option">
                                                <option data-display="Property Type">Property Type</option>
                                                <option>Residential</option>
                                                <option>Commercial</option>
                                                <option>Land</option>
                                                <option>Luxury</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="wide select_option">
                                                <option data-display="Area From">Area From </option>
                                                <option>1500</option>
                                                <option>1200</option>
                                                <option>900</option>
                                                <option>600</option>
                                                <option>300</option>
                                                <option>100</option>
                                            </select>
                                        </div>
                                        <div class="form-group">

                                            <select class="wide select_option" wire:model="location">
                                                <option data-display="Locations">Lokasi</option>
                                                @foreach ($locations as $location)
                                                    <option value="{{ $location->subdistrict_id }}" wire:key="{{str()->random(5)}}">
                                                        {{ $location->subdistrict_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <select class="wide select_option">
                                                <option data-display="Bedrooms">Bedrooms</option>
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <div class="form-group">
                                                <select class="wide select_option">
                                                    <option data-display="Bathrooms">Bathrooms</option>
                                                    <option>1</option>
                                                    <option>2</option>
                                                    <option>3</option>
                                                    <option>4</option>
                                                    <option>5</option>

                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-3">Price range</label>
                                            <div class="filter__price">
                                                <input class="price-range" type="text" name="my_range"
                                                    value="" />
                                            </div>
                                        </div>

                                        <div class="form-group mb-0 mt-2">

                                            <a class="btn btn-outline-primary btn-block text-capitalize advanced-filter"
                                                data-toggle="collapse" href="#multiCollapseExample1"
                                                aria-controls="multiCollapseExample1"><i
                                                    class="fa fa-plus-circle"></i>
                                                advanced
                                                filter
                                            </a>

                                            <div class="collapse multi-collapse" id="multiCollapseExample1">
                                                <div class="advancedfilter">
                                                    <div class="checkbox checkbox-primary">
                                                        <input id="checkbox2" type="checkbox">
                                                        <label for="checkbox2" class="label-brand text-capitalize">
                                                            Air Conditioning
                                                        </label>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products__filter__footer">
                                        <div class="form-group mb-0">
                                            <button type="submit"
                                                class="btn btn-primary text-capitalize btn-block"><i
                                                    class="fa fa-search ml-1"></i> search
                                                property </button>

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
                                                    <span
                                                        class="badge badge-primary">{{ $category->property_count }}</span>
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

    </div>
