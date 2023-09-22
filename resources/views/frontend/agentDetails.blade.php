@extends('layouts.app')
@section('content')
    @isset($agent)
    {{ Breadcrumbs::render('agentDetails', $agent) }}
    @endisset
    <!-- LISTING LIST -->
    <section class="profile__agents">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="row no-gutters">
                        <div class="col-lg-12 cards mt-0">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                    <a href="#" class="profile__agents-avatar">
                                        <img src="{{ asset($agent->image ?? 'assets/images/500x400.jpg') }}" alt=""
                                            class="img-fluid ">
                                        <div class="total__property-agent">{{ $agent->properties->count() }} properti
                                        </div>
                                    </a>
                                </div>
                                <div class="col-md-6 col-lg-6 my-auto">
                                    <div class="profile__agents-info">
                                        <h5 class="text-capitalize">
                                            <a href="#" target="_blank">{{ $agent->name }}</a>
                                        </h5>
                                        <p class="text-capitalize mb-1">Agen Properti</p>
                                        <ul class="list-unstyled mt-2">

                                            <li><a href="#">
                                                    <span>
                                                        <i class="fa fa-whatsapp"></i> Whatsapp :
                                                    </span>
                                                    {{ formatPhoneNumber($agent->whatsapp) }}
                                                </a>
                                            </li>

                                            <li><a href="#" class="text-capitalize"><span><i class="fa fa-fax"></i>
                                                        fax : </span> 342 655</a></li>
                                            <li><a href="#"><span><i class="fa fa-envelope"></i> Email :</span>
                                                    {{ $agent->emailAgent }}</a></li>
                                        </ul>
                                        <p class="mb-0 mt-3">
                                            <a href="{{ 'https://' . $agent->facebook }}"
                                                class="btn btn-social btn-social-o facebook mr-1">
                                                <i class="fa fa-facebook-f"></i>
                                            </a>
                                            <a href="{{ 'https://' . $agent->twitter }}"
                                                class="btn btn-social btn-social-o twitter mr-1">
                                                <i class="fa fa-twitter"></i>
                                            </a>

                                            <a href="{{ 'https://' . $agent->linkedin }}"
                                                class="btn btn-social btn-social-o linkedin mr-1">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                            <a href="{{ 'https://' . $agent->instagram }}"
                                                class="btn btn-social btn-social-o instagram mr-1">
                                                <i class="fa fa-instagram"></i>
                                            </a>

                                            <a href="{{ 'https://' . $agent->youtube }}"
                                                class="btn btn-social btn-social-o youtube mr-1">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </p>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- LOCATION -->
                    <div class="single__detail-features tabs__custom">
                        <h5 class="text-capitalize detail-heading">Detail Agen</h5>
                        <!-- FILTER VERTICAL -->
                        <ul class="nav nav-pills myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active pills-tab-one" data-toggle="pill" href="#pills-tab-one"
                                    role="tab" aria-controls="pills-tab-one" aria-selected="true">
                                    Deskripsi
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link pills-tab-two" data-toggle="pill" href="#pills-tab-two" role="tab"
                                    aria-controls="pills-tab-two" aria-selected="false">
                                    Properti</a>
                            </li>

                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="pills-tab-one" role="tabpanel"
                                aria-labelledby="pills-tab-one">
                                <div class="single__detail-desc">
                                    <h5 class="text-capitalize detail-heading">Perkenalkan Semua</h5>
                                    <div class="show__more">
                                        {!! $agent->description !!}
                                        <a href="javascript:void(0)" class="show__more-button ">lebih lengkap</a>
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="tab-pane fade" id="pills-tab-two" role="tabpanel" aria-labelledby="pills-tab-two">
                                <div class="row">
                                    @foreach ($agent->properties as $property)
                                        <div class="col-lg-12" data-price="{{ $property->price }}"
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
                                                                    alt="" class="img-fluid w100 img-transition">
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



                        </div>
                        <!-- END FILTER VERTICAL -->
                    </div>
                    <!-- END LOCATION -->
                </div>
                <div class="col-lg-4">
                    <div class="sticky-top">
                        <!-- FORM FILTER -->
                        <form class="products__filter mb-30" id="sendMessage">
                            <div class="products__filter__group">
                                <div class="products__filter__header">
                                    <h5 class="text-center text-capitalize">Hubungi {{ $agent->name }}</h5>
                                </div>
                                <div class="products__filter__body">
                                    <input type="hidden" name="user_id" value="{{ $agent->user_id }}">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" name="sender_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Email (Optional)</label>
                                        <input type="email" name="sender_email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Phone</label>
                                        <input type="text" name="sender_phone" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Subjek</label>
                                        <input type="text" name="subject" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Pesan anda</label>
                                        <textarea class="form-control" name="sender_message" rows="3"></textarea>
                                    </div>

                                </div>
                                <div class="products__filter__footer">
                                    <div class="form-group mb-0">
                                        <button type="submit" class="btn btn-primary text-capitalize btn-block send"> 
                                            submit <i class="fa fa-paper-plane ml-1"></i>
                                        </button>
                                        <button type="submit" class="btn btn-primary text-capitalize btn-block loading d-none" disabled> 
                                            <div class="spinner-border" role="status">
                                                <span class="sr-only">Mengirim...</span>
                                              </div>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                        <!-- END FORM FILTER -->
                        <!-- ARCHIVE CATEGORY -->
                        <aside class=" wrapper__list__category">
                            <!-- CATEGORY -->
                            <div class="widget widget__archive">
                                <div class="widget__title">
                                    <h5 class="text-dark mb-0 text-center">Categories Property</h5>
                                </div>
                                <ul class="list-unstyled">
                                    @foreach ($categories as $category)
                                        <li>
                                            <a href="#" class="text-capitalize">
                                                {{ $category->name }}
                                                <span class="badge badge-primary">{{ $category->properties_count }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- END CATEGORY -->
                        </aside>
                        <!-- End ARCHIVE CATEGORY -->
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- END LISTING LIST -->
@endsection

@section('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#sendMessage").validate({
                errorElement: "small", // Menggunakan tag <small> untuk pesan kesalahan
                errorClass: "text-danger", // Kelas CSS untuk pesan kesalahan
                rules: {
                    sender_name: {
                        required: true
                    },
                    sender_phone: {
                        required: true,
                        number: true,
                    },
                    sender_message: {
                        required: true,
                        minlength: 10
                    }
                },
                messages: {
                    sender_name: {
                        required: "Nama diperlukan"
                    },
                    sender_phone: {
                        required: "Nomor telepon diperlukan",
                        number: "Nomor haruslah angka"
                    },
                    sender_message: {
                        required: "Pesan Anda diperlukan",
                        minlength: "Pesan minimal terdiri dari 10 karakter"
                    }
                },
                errorPlacement: function(error, element) {
                    error.appendTo(element.closest(
                        ".form-group")); // Menempatkan pesan kesalahan di dalam elemen .form-group
                },

                submitHandler: function(form) {
                    // form.submit()
                    const userId = $('input[name="user_id"]').val()
                    const senderName = $('input[name="sender_name"]').val()
                    const senderPhone = $('input[name="sender_phone"]').val()
                    const senderEmail = $('input[name="sender_email"]').val()
                    const subject = $('input[name="subject"]').val()
                    const senderMessage = $('textarea[name="sender_message"]').val()
                    const formData = new FormData()
                    if (senderName !== null || senderPhone !== null || senderMessage !== null) {
                        formData.append("user_id", userId)
                        formData.append("sender_name", senderName)
                        formData.append("sender_phone", senderPhone)
                        formData.append("sender_email", senderEmail)
                        formData.append("subject", subject)
                        formData.append("sender_message", senderMessage)
                    }

                    $.ajax({
                        url: "http://localhost:8000/agentMessage",
                        headers: {
                            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content')
                        },
                        method: "POST",
                        processData: false,
                        contentType: false,
                        data: formData,
                        beforeSend: function() {
                            $("#sendMessage input").attr("disabled")
                            $("#sendMessage button.send").addClass("d-none")
                            $("#sendMessage button.loading").removeClass("d-none")
                            
                        },
                        success: function(result) {
                            $("#sendMessage input").removeAttr("disabled")
                            $("#sendMessage button.send").removeClass("d-none")
                            $("#sendMessage button.loading").addClass("d-none")
                            $("#sendMessage")[0].reset()
                            Swal.fire("Berhasil", "Pesan anda berhasil dikirimkan", "success")
                        }
                    })
                }
            })
        })
    </script>
@endsection
