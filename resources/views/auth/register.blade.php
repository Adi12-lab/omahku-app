@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('register') }}
    <!-- LISTING LIST -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Register -->
                    <div class="card mx-auto" style="max-width:520px;">
                        <div class="card-body">
                            <h4 class="card-title mb-4">Registrasi</h4>
                            <form action="{{ route('register') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username anda"
                                        name="username">
                                    <small class="text-danger">
                                        @error('username')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email anda"
                                        name="email">
                                    <small class="text-danger">
                                        @error('email')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Buat password</label>
                                    <input class="form-control" type="password" name="password">
                                    <small class="text-danger">
                                        @error('password')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Konfirmasi password</label>
                                    <input class="form-control" type="password" name="password_confirmation">
                                    <small class="text-danger">
                                        @error('password_confirmation')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block">
                                        Registrasi </button>
                                    <button type="button" disabled class="d-none btn btn-primary btn-block">
                                        Meregistrasi </button>
                                </div> <!-- form-group// -->

                            </form>
                        </div><!-- card-body.// -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END LISTING LIST -->
@endsection

@extends('layouts.app')
@section('scripts')
    <script>
        $(document).ready(function() {
            $("form").on("submit", function() {
                $("input").attr("disabled")
                $("button[type='submit']").hide();
                $("button[disabled]").removeClass("d-none")
            })
        })
    </script>
@endsection
