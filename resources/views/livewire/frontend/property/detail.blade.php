<div>
    {{ Breadcrumbs::render('propertyView', $property) }}
    <!-- SINGLE DETAIL -->
    <section class="single__Detail">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- TITLE PROPERTY AND PRICE  -->
                    <div class="single__detail-area pt-0 pb-4">
                        <div class="row">
                            <div class="col-md-8 col-lg-8">
                                <div class="single__detail-area-title">
                                    <h3 class="text-capitalize">{{ $property->name }}</h3>
                                    <p> {{ $property->address }}</p>
                                </div>
                            </div>
                            <div class="col-md-4 col-lg-4">
                                <div class="single__detail-area-price">
                                    <h3 class="text-capitalize text-gray">{{ rupiah($property->price) }}</h3>
                                    <ul class="list-inline">
                                        <li class="list-inline-item">
                                            <a href="#" wire:click="addToWishlist({{ $property->id }})"
                                                {{-- @dd($isInWishlist) --}}
                                                class="badge badge-{{ $isInWishlist ? 'danger' : 'primary' }} p-2 rounded">
                                                <i class="fa fa-heart"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END TITLE PROPERTY AND PRICE  -->

                    <!-- SLIDER IMAGE DETAIL -->
                    <div class="slider__image__detail-large-two owl-carousel owl-theme" wire:ignore>
                        @foreach ($property->propertyImages as $image)
                            <div class="item">
                                <div class="slider__image__detail-large-one">
                                    <img src="{{ asset($image->image ?? 'assets/images/1920x1080.jpg') }}"
                                        alt="" class="img-fluid w-100 img-transition">
                                    <div class="description">
                                        <figure>
                                            <img src="{{ asset($property->agent->images ?? 'assets/images/80x80.jpg') }}"
                                                alt="" class="img-fluid">
                                        </figure>
                                        @if ($property->status === 1)
                                            <span class="badge badge-primary text-capitalize mb-2">
                                                {{ $property->for === 0 ? 'Dijual' : 'Disewakan' }}
                                            </span>
                                        @else
                                            <span class="badge badge-danger text-capitalize mb-2">
                                                soldout
                                            </span>
                                        @endif
                                        <div class="price">
                                            <h5 class="text-capitalize">{{ rupiah($property->price) }}</h5>
                                        </div>
                                        <h4 class="text-capitalize">{{ $property->name }}</h4>

                                    </div>

                                </div>
                            </div>
                        @endforeach
                    </div>

                    <div class="slider__image__detail-thumb-two owl-carousel owl-theme" wire:ignore>
                        @foreach ($property->propertyImages as $image)
                            <div class="item">
                                <div class="slider__image__detail-thumb-one">
                                    <img src="{{ asset($image->image ?? 'assets/images/600x400.jpg') }}" alt=""
                                        class="img-fluid w-100 img-transition">
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- END SLIDER IMAGE DETAIL -->
                </div>
                <div class="col-lg-4 pt-5">
                    <div class="sticky-top">
                        <!-- PROFILE AGENT -->
                        <div class="profile__agent mb-30">
                            <div class="profile__agent__group">

                                <div class="profile__agent__header">
                                    <div class="profile__agent__header-avatar">
                                        <figure>
                                            <img src="{{ $property->agent->image ?? 'assets/images/80x80.jpg' }}"
                                                alt="" class="img-fluid">
                                        </figure>

                                        <ul class="list-unstyled mb-0">
                                            <li>
                                                <h5 class="text-capitalize">{{ $property->agent->name }}</h5>
                                            </li>
                                            <li><a href="tel:123456"><i
                                                        class="fa fa-phone-square mr-1"></i>{{ formatPhoneNumber($property->agent->whatsapp) }}</a>
                                            </li>
                                            <li><a href="javascript:void(0)"><i class=" fa fa-building mr-1"></i>
                                                    Company name</a>
                                            </li>
                                            <li> <a href="javascript:void(0)" class="text-primary">List Properti
                                                    Saya</a>
                                            </li>
                                        </ul>


                                    </div>

                                </div>
                                <form wire:submit="sendMessage">
                                    <div class="profile__agent__body">
                                        <input type="hidden" name="user_id" value="{{ $property->agent->user->id }}">
                                        <div class="form-group">
                                            <label>Nama Lengkap</label>
                                            <input type="text" wire:model.defer="sender_name" class="form-control">
                                            @error('sender_name')
                                                <small class="text-danger"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Email (Optional)</label>
                                            <input type="email" wire:model.defer="sender_email" class="form-control">
                                            @error('sender_email')
                                                <small class="text-danger"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label>Phone</label>
                                            <input type="text" wire:model.defer="sender_phone" class="form-control">
                                            @error('sender_phone')
                                                <small class="text-danger"> {{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Subjek</label>
                                            <input type="text" wire:model.defer="subject" class="form-control">
                                            @error('subject')
                                                <small class="text-danger"> {{ $message }}</small>
                                            @enderror
                                        </div>

                                        <div class="form-group">
                                            <label>Pesan anda</label>
                                            <textarea class="form-control" wire:model.defer="sender_message" rows="3"></textarea>
                                            @error('sender_message')
                                                <small class="text-danger"> {{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="profile__agent__footer">
                                        <div class="form-group mb-0">
                                            <button wire:loading.remove type="submit" class="btn btn-primary text-capitalize btn-block">
                                                Kirim Pesan <i class="fa fa-paper-plane ml-1"></i></button>
                                            <button wire:loading class="btn btn-primary text-capitalize btn-block" disabled>
                                                <div class="spinner-border" role="status">
                                                    <span class="sr-only">Mengirim...</span>
                                                </div>
                                            </button>

                                        </div>
                                    </div>

                                </form>
                            </div>

                        </div>
                        <!-- END PROFILE AGENT -->

                    </div>
                </div>
                <div class="col-lg-8">
                    <!-- DESCRIPTION -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="single__detail-desc">
                                <h6 class="text-capitalize detail-heading">deskripsi</h6>
                                <div class="show__more">
                                    {!! $property->description !!}
                                    <a href="javascript:void(0)" class="show__more-button ">lebih lengkap</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>

                            <!-- PROPERTY DETAILS SPEC -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">Detail Properti</h6>
                                <!-- INFO PROPERTY DETAIL -->
                                <div class="property__detail-info">
                                    <div class="row">
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                <li><b>Harga:</b> {{ rupiah($property->price) }}</li>
                                                <li><b>Luas Properti:</b> {{ $property->size }}</li>
                                                <li><b>Kamar Tidur:</b> {{ $property->bedrooms }}</li>
                                                <li><b>Kamar Mandi:</b> {{ $property->bathrooms }}</li>
                                            </ul>
                                        </div>
                                        <div class="col-md-6 col-lg-6">
                                            <ul class="property__detail-info-list list-unstyled">
                                                <li><b>Tanggal dibangun:</b> {{ $property->year_built }}</li>
                                                <li><b>Kategori Properti:</b> {{ $property->category->name }}</li>
                                                <li><b>Status
                                                        Properti:</b>{{ $property->for === '1' ? 'Disewakan' : 'Dijual' }}
                                                </li>
                                                <li><b>Tersedia:</b>{{ $property->status === '1' ? 'Ya' : 'Tidak' }}
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                </div>
                                <!-- END INFO PROPERTY DETAIL -->
                            </div>
                            <!-- END PROPERTY DETAILS SPEC -->
                            <div class="clearfix"></div>

                            <!-- FEATURES -->
                            <div class="single__detail-features">
                                <h6 class="text-capitalize detail-heading">Fasilitas</h6>
                                <ul class="list-unstyled icon-checkbox">
                                    @foreach ($property->propertyFeatures as $propertyFeature)
                                        {{-- @dd($feature) --}}
                                        <li>{{ $propertyFeature->feature->name }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- END FEATURES -->

                            @if ($property->propertyFloors->count() > 0)
                                <!-- FLOR PLAN -->
                                @dd($property->propertyFloors)
                                <div class="single__detail-features">
                                    <h6 class="text-capitalize detail-heading">Daftar Lantai</h6>
                                    <!-- FLOR PLAN IMAGE -->
                                    <div id="accordion" class="floorplan" role="tablist">
                                        @foreach ($property->propertyFloors as $floor)
                                            <div class="card">
                                                <div class="card-header" role="tab" id="headingOne">
                                                    <a class="text-capitalize" data-toggle="collapse"
                                                        href="#collapseOne" aria-expanded="true"
                                                        aria-controls="collapseOne">
                                                        {{ $floor->name }}
                                                        <span class="badge badge-light rounded p-1 ml-2">
                                                            {!! meter($floor->size) !!}
                                                        </span>
                                                    </a>
                                                </div>
                                                <div id="collapseOne" class="collapse show" role="tabpanel"
                                                    aria-labelledby="headingOne" data-parent="#accordion">
                                                    <div class="card-body">
                                                        <figure>
                                                            <img src="{{ asset($floor->image) }}" alt=""
                                                                class="img-fluid">
                                                        </figure>
                                                        {{ $floor->description }}

                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <!-- END FLOR PLAN -->

                            @if ($property->street_iframe || $property->map_iframe)
                                <!-- LOCATION -->
                                <div class="single__detail-features">
                                    <h6 class="text-capitalize detail-heading">lokasi</h6>
                                    <!-- FILTER VERTICAL -->
                                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                        @if ($property->map_iframe)
                                            <li class="nav-item">
                                                <a class="nav-link active" id="pills-map-location-tab"
                                                    data-toggle="pill" href="#pills-map-location" role="tab"
                                                    aria-controls="pills-map-location" aria-selected="true">
                                                    <i class="fa fa-map-marker"></i>
                                                </a>
                                            </li>
                                        @endif

                                        @if ($property->street_iframe)
                                            <li class="nav-item">
                                                <a class="nav-link" id="pills-street-view-tab" data-toggle="pill"
                                                    href="#pills-street-view" role="tab"
                                                    aria-controls="pills-street-view" aria-selected="false">
                                                    <i class="fa fa-street-view "></i></a>
                                            </li>
                                        @endif

                                    </ul>
                                    <div class="tab-content" id="pills-tabContent">
                                        @if ($property->map_iframe)
                                            <div class="tab-pane fade show active" id="pills-map-location"
                                                role="tabpanel" aria-labelledby="pills-map-location-tab">
                                                <div id="map-canvas">
                                                    <iframe class="h600 w100" src="{{ $property->map_iframe }}"
                                                        style="border:0;" allowfullscreen="" aria-hidden="false"
                                                        tabindex="0"></iframe>
                                                </div>

                                            </div>
                                        @endif
                                        @if ($property->street_iframe)
                                            <div class="tab-pane fade" id="pills-street-view" role="tabpanel"
                                                aria-labelledby="pills-street-view-tab">
                                                <iframe class="h600 w100" src="{{ $property->street_iframe }}"
                                                    style="border:0;" allowfullscreen></iframe>
                                            </div>
                                        @endif

                                    </div>
                                    <!-- END FILTER VERTICAL -->
                                </div>
                                <!-- END LOCATION -->

                            @endif
                        </div>
                    </div>
                    <!-- END DESCRIPTION -->
                </div>
            </div>

            <!-- SIMILIAR PROPERTY -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="similiar__item">
                        <h6 class="text-capitalize detail-heading">
                            properti relevan
                        </h6>
                        <div class="similiar__property-carousel owl-carousel owl-theme">
                            @foreach ($similiarProperties as $property)
                                <div class="item" wire:ignore>
                                    <!-- ONE -->
                                    <div class="card__image">
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
                                                <a
                                                    href="{{ route('frontend.property.view', $property->slug) }}">{{ $property->name }}</a>
                                            </h6>

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
                                                        luas <br>
                                                        <i class="fa fa-map"></i> {{ $property->size }}
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
                                                <li class="list-inline-item">
                                                    <a href="#">
                                                        {{ $property->agent->name }}<br>
                                                    </a>

                                                </li>

                                            </ul>
                                            <ul class="list-inline my-auto ml-auto">
                                                <li class="list-inline-item">

                                                    <h6 class="text-primary">{{ rupiah($property->price) }}</h6>
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
            <!-- END SIMILIAR PROPERTY -->

        </div>
    </section>
    <!-- END SINGLE DETAIL -->

</div>


@push('scripts')
    <!-- Sweet Alerts js -->
    <script>
        document.addEventListener("livewire:init", function() {
            Livewire.on("wishlistAlert", function({
                message
            }) {
                Swal.fire(
                    message.head,
                    message.text,
                    message.type
                )
            })

            Livewire.on("successMessage", function() {
                Swal.fire("Berhasil", "Pesan anda berhasil dikirimkan", "success")
            })
        })
    </script>
@endpush
