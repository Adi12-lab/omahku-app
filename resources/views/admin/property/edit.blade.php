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
                    <form action="{{ route('property.update', $property->slug) }}" method="POST" enctype="multipart/form-data"
                        class="card-body">
                        @csrf
                        @method("PATCH")
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
                                <a class="nav-link" data-bs-toggle="tab" href="#feature-1" role="tab">
                                    <span class="d-block d-sm-none"><i class="far fa-user"></i></span>
                                    <span class="d-none d-sm-block">Fasilitas</span>
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
                                        <select class="form-select" name="category_id" aria-label="Default select example">
                                            <option selected="">Pilih Kategori</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}"
                                                    {{ old('category_id', $property->category->id) === $category->id ? 'selected' : '' }}>
                                                    {{ $category->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for=name" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id=name" name="name"
                                            value="{{ old('name', $property->name) }}">
                                        @error('name')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="slug" class="col-sm-2 col-form-label">Slug</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" id="slug" name="slug"
                                            value="{{ old('slug', $property->slug) }}">
                                        @error('slug')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                       <!-- end row -->
                                <div class="row mb-3">
                                    <label for="small_description" class="col-sm-2 col-form-label">Deskripsi Singkat</label>
                                    <div class="col-sm-10">
                                        <textarea name="small_description" id="small_description" rows="3" class="form-control" rows="5">
                                            {{ old('small_description', $property->small_description) }}
                                        </textarea>
                                        @error('small_description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                         
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                                    <div class="col-sm-10">
                                        <textarea name="description" id="description" rows="5">
                                            {{ old('description', $property->description) }}
                                        </textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3">
                                    <label for="example-date-input" class="col-sm-2 col-form-label">Tanggal
                                        dibangun</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" name="year_built" value="2011-08-19"
                                            id="example-date-input" value="{{ old('year_built', $property->year_built) }}">
                                        @error('year_built')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="row mb-3 justify-content-end">
                                    <div class="col-sm-10">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <label class="col-12 col-form-label">
                                                        Kamar Mandi
                                                    </label>
                                                    <div class="col">
                                                        <input type="number" class="form-control" name="bathrooms"
                                                            value="{{ old('bathrooms', $property->bathrooms) }}">
                                                        @error('bathrooms')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <label class="col-12 col-form-label">
                                                        Kamar Tidur
                                                    </label>
                                                    <div class="col">
                                                        <input type="number" class="form-control" name="bedrooms"
                                                            value="{{ old('bedrooms', $property->bedrooms) }}">
                                                        @error('bedrooms')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row">
                                                    <label class="col-12 col-form-label">
                                                        Jumlah Ruangan
                                                    </label>
                                                    <div class="col">
                                                        <input type="number" class="form-control" name="rooms"
                                                            value="{{ old('rooms', $property->rooms) }}">
                                                        @error('rooms')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
                                                    <div class="col mt-3">
                                                        <input type="checkbox" id="for" switch="primary"
                                                            {{ old('for', $property->for) ? 'checked' : '' }} name="for" />
                                                        <label for="for" data-on-label="Yes"
                                                            data-off-label="No"></label>
                                                        @error('for')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <label class="col-sm-4 col-form-label">
                                                        Featured
                                                    </label>
                                                    <div class="col mt-3">
                                                        <input type="checkbox" id="isFeatured" switch="success"
                                                            {{ old('isFeatured', $property->isFeatured) ? 'checked' : '' }} name="isFeatured" />
                                                        <label for="isFeatured" data-on-label="Yes"
                                                            data-off-label="No"></label>
                                                        @error('isFeatured')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="row align-items-center">
                                                    <label class="col-sm-4 col-form-label">
                                                        Aktif
                                                    </label>
                                                    <div class="col mt-3">
                                                        <input type="checkbox" id="status" switch="success" checked
                                                            {{ old('status', $property->status) ? 'checked' : '' }} name="status" />
                                                        <label for="status" data-on-label="Yes"
                                                            data-off-label="No"></label>
                                                        @error('status')
                                                            <small class="text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label class="col-sm-2">Harga Properti</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="price"
                                            value="{{ old('price', $property->price) }}">
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <label class="col-sm-2">Luas Properti (m2)</label>
                                    <div class="col-sm-10">
                                        <input type="number" class="form-control" name="size"
                                            value="{{ old('size', $property->size) }}">
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
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="col-md-5 mx-auto">
                                                            <table class="table mb-0">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col">Image</th>
                                                                        <th scope="col">Hapus</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    @foreach($property->propertyImages as $image)
                                                                    <tr>
                                                                        <td>
                                                                            <img src="{{asset($image->image)}}" width="120" alt="Product image">
                                                                            <input type="hidden" name="previous_image[]" value="{{$image->id}}">
                                                                        </td>
                                                                        <td>
                                                                            <button type="button" class="remove-image border-0 bg-white">
                                                                                <span class="text-danger fs-3"><i class="mdi mdi-trash-can"></i></span>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                <input id="property_image" name="images[]" type="file"
                                                    accept="image/*" multiple>

                                            </div>
                                        </div>
                                    </div> <!-- end col -->
                                </div> <!-- end row -->
                            </div>
                            <div class="tab-pane" id="feature-1" role="tabpanel">
                                <div class="row">
                                    @foreach ($mergePropertiesFeatures as $feature)
                                        <div class="col-sm-4 col-lg-3">
                                            <div class="row align-items-center">
                                                <div class="col-1">
                                                    <input type="checkbox" name="features[]"
                                                        value="{{ $feature["id"] }}" {{$feature["isSelected"] ? "checked" : ""}}>
                                                </div>
                                                <label class="col-10 col-form-label">
                                                    {{ $feature["name"] }}
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="tab-pane" id="location-1" role="tabpanel">
                             
                                <div class="row mb-3">
                                    <label class="col-form-label"> Kecamatan</label>

                                    <select class="select2 form-control w-100" name="subdistrict_id">
                                        <option>Pilih Kecamatan</option>
                                        @foreach($subdistricts as $subdistrict)
                                        
                                        <option value="{{$subdistrict->subdistrict_id}}" {{$subdistrict->subdistrict_id === $property->subdistrict_id ? "selected" : ""}}>
                                            {{$subdistrict->subdistrict_name}}
                                        </option>
                                        @endforeach
                                    </select>
                                    @error('subdistrict_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div> <!-- end row -->
                                <div class="row mb-3">
                                    <label class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                    <textarea name="address" class="form-control" rows="6">
                                            {{ old('address', $property->address) }}
                                    </textarea>
                                        @error('address')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <!-- end row -->
                                <div class="row mb-3">
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <label class="col-12 col-form-label">
                                                Garis Lintang
                                            </label>
                                            <div class="col">
                                                <input type="text" class="form-control" inputmode="decimal"
                                                    name="latitude" placeholder="-12.043333"
                                                    step="any"
                                                    value="{{ old('latitude', $property->latitude) }}" pattern="-?\d+(\.\d+)?">

                                                @error('latitude')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="row">
                                            <label class="col-12 col-form-label">
                                                Garis Bujur
                                            </label>
                                            <div class="col">
                                                <input type="number" class="form-control" inputmode="decimal"
                                                    name="longitude" placeholder="-77.028333"
                                                    value="{{ old('longitude', $property->longitude) }}" step="any"
                                                    pattern="-?\d+(\.\d+)?">
                                                @error('longitude')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-form-label">Map Iframe</label>
                                    <div class="col-12">
                                    <textarea name="map_iframe" class="form-control" rows="6">
                                            {{ old('map_iframe', $property->map_iframe) }}
                                    </textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-form-label">Street Iframe</label>
                                    <div class="col-12">
                                    <textarea name="street_iframe" class="form-control" rows="6">
                                            {{ old('street_iframe', $property->street_iframe) }}
                                    </textarea>
                                        @error('description')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="w-100">
                            <button type="submit" class="btn btn-success ms-auto">Simpan</button>
                        </div>
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
            $(".select2[name='subdistrict_id']").select2()

            //initial

            $(".remove-image").click(function(e) {
                $(this).parents("tr").remove()
            })
        })
    </script>

    <!-- Plugins js -->
@endsection
