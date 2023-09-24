@extends('layouts.app')
@section('content')
    {{ Breadcrumbs::render('profile') }}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card p-4">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link active d-flex justify-content-between align-items-center"
                                    id="v-pills-user-tab" data-toggle="pill" href="#v-pills-user" role="tab"
                                    aria-controls="v-pills-user" aria-selected="true">
                                    User
                                    <i class="fa fa-user-o"></i>
                                </a>


                                @if ($user->role_as === 1)
                                    <a class="nav-link mb-2 d-flex justify-content-between" id="v-pills-agent-tab"
                                        data-toggle="pill" href="#v-pills-agent" role="tab"
                                        aria-controls="v-pills-agent" aria-selected="false">
                                        Agent
                                        <i class="fa fa-user-circle"></i>
                                    </a>
                                @endif

                                <a class="nav-link d-flex justify-content-between align-items-center"
                                    id="v-pills-password-tab" data-toggle="pill" href="#v-pills-password" role="tab"
                                    aria-controls="v-pills-password" aria-selected="false">
                                    Password
                                    <i class="fa fa-key"></i>
                                </a>
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="tab-content text-muted mt-4 mt-md-0 ml-4" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-user" role="tabpanel"
                                    aria-labelledby="v-pills-user-tab">
                                    <div class="row">
                                        @if (session('status'))
                                            <div class="alert alert-success" role="alert">
                                                {{ session('status') }}
                                            </div>
                                        @endif
                                        @if ($errors->any())
                                            <div class="alert alert-danger" role="alert">
                                                <ul>
                                                    @foreach ($errors->all() as $error)
                                                        <li>{{ $error }}</li>
                                                    @endforeach
                                                </ul>

                                            </div>
                                        @endif
                                        <div class="col-12">
                                            <h5>Pengaturan User</h5>
                                        </div>
                                        <form class="col" action="{{ route('profile.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="col-form-label">Username</label>
                                                    <input type="text"
                                                        class="form-control @error('username') is-invalid @enderror "
                                                        name="username" value="{{ $user->username }}">
                                                    @error('username')
                                                        <small class="text-danger">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="col-form-label">Email</label>
                                                    <input type="text"
                                                        class="form-control @error('email') is-invalid @enderror"
                                                        name="email" value="{{ $user->email }}">
                                                    @error('email')
                                                        <small class="text-danger">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-12">
                                                    <h5>Gambar Profile</h5>
                                                    {{-- @dd(auth()->user()) --}}
                                                    <img src="{{ asset($user->image ?? 'assets/images/360x300.jpg') }}"
                                                        alt="user_image" class="rounded w-50" id="previewUserImage">
                                                </div>
                                                <div class="col-12 mt-2">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="image"
                                                            id="userImage">
                                                        <label class="custom-file-label" for="customFile">Pilih
                                                            Avatar</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-4">
                                                    <button type="submit" class="btn btn-warning ms-auto">
                                                        Simpan
                                                        <i class="fa fa-floppy-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-password" role="tabpanel"
                                    aria-labelledby="v-pills-password-tab">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5>Ubah Password</h5>
                                        </div>
                                        <form class="col" action="{{ route('password.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="col-form-label" for="current_password">Password
                                                        lama</label>
                                                    <input type="password"
                                                        class="form-control @error('current_password') is-invalid @enderror "
                                                        name="current_password">
                                                    @error('current_password')
                                                        <small class="text-danger">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="col-form-label" for="password">Password baru</label>
                                                    <input type="password"
                                                        class="form-control @error('password') is-invalid @enderror"
                                                        name="password">
                                                    @error('password')
                                                        <small class="text-danger">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="col-form-label">Password Konfirmasi</label>
                                                    <input type="password"
                                                        class="form-control @error('password_confirmation') is-invalid @enderror"
                                                        name="password_confirmation">
                                                    @error('password_confirmation')
                                                        <small class="text-danger">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="row justify-content-center">
                                                <div class="col-4">
                                                    <button type="submit" class="btn btn-warning ms-auto">
                                                        Ubah
                                                        <i class="fa fa-floppy-o"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if ($user->role_as === 1)
                                    <div class="tab-pane fade " id="v-pills-agent" role="tabpanel"
                                        aria-labelledby="v-pills-agent-tab">
                                        <div class="row">
                                            <div class="col">
                                                <h5>Pengaturan Agent</h5>
                                                <p>Untuk mengatur berbagai list properti sebagai agent, klik link berikut
                                                </p>
                                                <a href="{{ route('dashboard.admin') }}">Halaman agent</a>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(() => {
            $('#userImage').change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#previewUserImage').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });

        });
    </script>
@endsection
