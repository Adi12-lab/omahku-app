@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col">
                <div class="card p-4">
                    <div class="card-title">
                        <h2>
                            Profil Anda
                        </h2>
                    </div>
                    <div class="row">
                        <div class="col-md-2">
                            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                <a class="nav-link mb-2 active d-flex justify-content-between" id="v-pills-user-tab"
                                    data-bs-toggle="pill" href="#v-pills-user" role="tab" aria-controls="v-pills-user"
                                    aria-selected="true">
                                    User
                                    <i class="ri-user-line"></i>
                                </a>
                                @if (auth()->user()->role_as === 1)
                                    <a class="nav-link mb-2 d-flex justify-content-between" id="v-pills-agent-tab"
                                        data-bs-toggle="pill" href="#v-pills-agent" role="tab"
                                        aria-controls="v-pills-agent" aria-selected="false">
                                        Agent
                                        <i class="ri-user-2-fill"></i>
                                    </a>
                                @endif
                            </div>
                        </div>

                        <div class="col-md-9">
                            <div class="tab-content text-muted mt-4 mt-md-0 ms-4" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-user" role="tabpanel"
                                    aria-labelledby="v-pills-user-tab">
                                    <div class="row">
                                        <h4>Pengaturan User</h4>
                                        @if (session('message'))
                                            <div class="alert alert-{{ session('message')['type'] }}" role="alert">
                                                {{ session('message')['text'] }}
                                            </div>
                                        @endif
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

                                        <form class="col" action="{{ route('profile.update') }}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PATCH')

                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label class="col-form-label">Username</label>
                                                    <input type="text" class="form-control" name="username"
                                                        value="{{ auth()->user()->username }}">
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
                                                    <input type="text" class="form-control" name="email"
                                                        value="{{ auth()->user()->email }}">
                                                    @error('email')
                                                        <small class="text-danger">
                                                            {{ $message }}
                                                        </small>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="row mb-3 gap-3">
                                                <div class="col-12">
                                                    <h5>Gambar Profile</h5>
                                                    <img src="{{ asset(auth()->user()->image ?? 'assets/images/360x300.jpg') }}"
                                                        alt="user_image" class="avatar-lg rounded-circle img-cover"
                                                        id="previewUserImage">
                                                </div>
                                                <div class="col-12">
                                                    <input type="file" class="form-control" name="image"
                                                        id="userImage">
                                                </div>
                                            </div>
                                            <div class="row justify-content-center">
                                                <div class="col-2">
                                                    <button type="submit" class="btn btn-warning ms-auto">
                                                        Simpan
                                                        <i class=" ri-save-2-fill"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                @if (auth()->user()->role_as === 1)
                                    <div class="tab-pane fade " id="v-pills-agent" role="tabpanel"
                                        aria-labelledby="v-pills-agent-tab">
                                        <div class="row">
                                            <form action="{{ route('profile.agent.cu') }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                @method('PATCH')
                                                <h4>Pengaturan Agent</h4>

                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="col-form-label">Nama</label>
                                                        <input type="text" class="form-control" name="name"
                                                            value="{{ $agent->name ?? null }}">
                                                        @error('name')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror

                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="col-form-label"> <i class="ri-whatsapp-line"></i>
                                                            Whatsapp</label>
                                                        <input type="number" class="form-control" name="whatsapp"
                                                            value="{{ $agent->whatsapp ?? null}}">
                                                        @error('whatsapp')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label"> <i class="ri-facebook-fill"></i>
                                                            Facebook</label>
                                                        <input type="text" class="form-control" name="facebook"
                                                            value="{{ $agent->facebook ?? null }}">
                                                        @error('facebook')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label"> <i class="ri-twitter-line"></i>
                                                            Twitter</label>
                                                        <input type="text" class="form-control" name="twitter"
                                                            value="{{ $agent->twitter ?? null }}">
                                                        @error('twitter')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label"> <i class="ri-instagram-line"></i>
                                                            Instagram</label>
                                                        <input type="text" class="form-control" name="instagram"
                                                            value="{{ $agent->instagram ?? null }}">
                                                        @error('instagram')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label"> <i class="ri-linkedin-line"></i>
                                                            Linkedin</label>
                                                        <input type="text" class="form-control" name="linkedin"
                                                            value="{{ $agent->linkedin ?? null}}">
                                                        @error('linkedin')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="col-form-label"> <i class="ri-youtube-line"></i>
                                                            Youtube</label>
                                                        <input type="text" class="form-control" name="youtube"
                                                            value="{{ $agent->youtube ?? null}}">
                                                        @error('youtube')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                    <div class="col-12 mt-3">
                                                        <label class="col-form-label"> <i class="ri-mail-line"></i>
                                                            Email yang bisa dihubungi</label>
                                                        <input type="email" class="form-control" name="emailAgent"
                                                            value="{{ $agent->emailAgent ?? null }}">
                                                        @error('emailAgent')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col">
                                                        <label class="col-form-label" for="description">
                                                            Deskripsi Saya</label>
                                                        <textarea name="description" id="description" rows="8" class="form-control">{{ $agent->description ?? null }}</textarea>
                                                        @error('description')
                                                            <small class="text-danger">
                                                                {{ $message }}
                                                            </small>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="row mb-3 gap-3">
                                                    <div class="col-12">
                                                        <h5>Gambar Agent</h5>
                                                        <img src="{{ asset($agent->image ?? 'assets/images/360x300.jpg') }}"
                                                            alt="agent_image" width="300" id="previewAgentImage">
                                                    </div>
                                                    <div class="col-12">
                                                        <input type="file" class="form-control" name="image"
                                                            id="agentImage">
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <button type="submit" class="btn btn-warning ms-auto">
                                                            Simpan
                                                            <i class=" ri-save-2-fill"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
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
    <script src="{{ asset('admin/libs/tinymce/tinymce.min.js') }}"></script>

    <!-- init js -->
    <script src="{{ asset('admin/js/pages/form-editor.init.js') }}"></script>
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
            $('#agentImage').change(function() {
                const file = this.files[0];
                if (file) {
                    let reader = new FileReader();
                    reader.onload = function(event) {
                        console.log(event.target.result);
                        $('#previewAgentImage').attr('src', event.target.result);
                    }
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>
@endsection
