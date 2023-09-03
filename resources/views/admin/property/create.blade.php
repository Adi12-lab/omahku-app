@extends('layouts.admin')

@section('styles')
    <!-- Plugins css -->
    <link rel="stylesheet" href="{{ asset('admin/libs/Drag-And-Drop/dist/imageuploadify.min.css') }}">
    <link href="{{ asset('admin/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('content')
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                    <h4 class="mb-sm-0">Tambah Properti</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data"
                        class="card-body">
                        @csrf
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-justified" role="tablist">
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link active" data-bs-toggle="tab" href="#main-1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                    <span class="d-none d-sm-block">Main</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#image-1" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Gambar</span>
                                </a>
                            </li>
                            <li class="nav-item waves-effect waves-light">
                                <a class="nav-link" data-bs-toggle="tab" href="#location-1" role="tab">
                                    <span class="d-block d-sm-none"><i class="fas fa-cog"></i></span>
                                    <span class="d-none d-sm-block">Lokasi</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content p-3 text-muted">
                            <div class="tab-pane active" id="main-1" role="tabpanel">

                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Kategori</label>
                                    <div class="col-sm-10">
                                        <select class="form-select" name="category" aria-label="Default select example">
                                            <option selected="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for=name" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id=name" name="name">
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="slug" name="slug">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" rows="5"></textarea>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-date-input" class="col-sm-2 col-form-label">Tanggal
                                        dibangun</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" value="2011-08-19"
                                            id="example-date-input">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <label class="col-sm-4 col-form-label">
                                                        Disewakan
                                                    </label>
                                                    <div class="col mb-2">
                                                        <input class="form-check-input mt-2" type="checkbox" name="rent">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <label class="col-sm-4 col-form-label">
                                                        Featured
                                                    </label>
                                                    <div class="col mb-2">
                                                        <input class="form-check-input mt-2" type="checkbox"
                                                            name="rent">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <label class="col-sm-4 col-form-label">
                                                        Diarsipkan
                                                    </label>
                                                    <div class="col mb-2">
                                                        <input class="form-check-input mt-2" type="checkbox"
                                                            name="rent">
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->


                            </div>
                            <div class="tab-pane" id="image-1" role="tabpanel">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <h4 class="card-title">Upload Gambar Properti</h4>
                                                <p class="card-title-desc">
                                                    Gambar pertama yang anda upload akan menjadi thumbnail properti
                                                    tersebut
                                                </p>
                                                <input id="property_image" name="images[]" type="file"
                                                    accept="image/*" multiple>

                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                            <div class="tab-pane" id="location-1" role="tabpanel">
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"> Provinsi</label>
                                    <select class="select2 form-control" name="province_id">
                                        <option>Pilih provinsi</option>
                                        @foreach ($provinces as $province)
                                            <option value="{{ $province->province_id }}">{{ $province->province_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div> <!-- end row -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"> Kota / Kabupaten</label>
                                    <select class="select2 form-control" name="city_id">
                                        <option>Pilih Kota/Kabupaten</option>
                                    </select>
                                </div> <!-- end row -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label"> Kecamatan</label>
                                    <select class="select2 form-control" name="subdistrict_id">
                                        <option>Pilih Kecamatan</option>
                                    </select>
                                </div> <!-- end row -->
                            </div>
                        </div>

                </div>
                <div class="row">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

                </form>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->



    </div>
@endsection

@section('scripts')
    <!--tinymce js-->
    <script src="{{ asset('admin/libs/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('admin/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('admin/js/pages/form-editor.init.js') }}"></script>

    <script src="{{ asset('admin/libs/Drag-And-Drop/dist/imageuploadify.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#property_image").imageuploadify();

            //initial

            $citySelect = $(".select2[name='city_id']")
            $subDistrictSelect = $(".select2[name='subdistrict_id']")

            $(".select2[name='province_id']").select2()
            $citySelect.select2()
            $subDistrictSelect.select2()

            $(".select2[name='province_id']").on("change", function() {
                const provinceId = $(this).val()

                if (provinceId) {
                    $.ajax({
                        url: "/api/cities/" + provinceId,
                        type: "GET",
                        dataType: "json",
                        success: function(results) {
                            $citySelect.empty();
                            $citySelect.append(
                                '<option value="">Pilih Kota/Kabupaten</option>');
                            $.each(results, function(_key, value) {
                                $citySelect.append('<option value="' + value.city_id +
                                    '">' +
                                    value.city_name + '</option>');
                            });

                            // Mengosongkan dropdown Kecamatan
                            $subDistrictSelect.empty();
                            $subDistrictSelect.append(
                                '<option value="">Pilih Kecamatan</option>');
                        }
                    })
                }
                else {
                    $citySelect.empty()
                    $subDistrictSelect.empty()
                }
            })

            $($citySelect).on("change", function() {
                const cityId = $(this).val()

                if(cityId) {
                    $.ajax({
                        url: "/api/subdistricts/" + cityId,
                        type: "GET",
                        dataType: "json",
                        success: function(results) {
                            $subDistrictSelect.empty();
                            $subDistrictSelect.append(
                                '<option value="">Pilih Kecamatan</option>');
                            $.each(results, function(_key, value) {
                                $subDistrictSelect.append('<option value="' + value.subdistrict_id +
                                    '">' +
                                    value.subdistrict_name + '</option>');
                            });

                   
                        }
                    })
                }else {
                    $subDistrictSelect.empty()
                }
            })
        })
    </script>

    <!-- Plugins js -->
@endsection
