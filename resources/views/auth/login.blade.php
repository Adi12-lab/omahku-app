@extends('layouts.app')

@section('content')
    {{ Breadcrumbs::render('login') }}
    <!-- LISTING LIST -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <!-- Form Login -->
                    <div class="card mx-auto" style="max-width: 380px;">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if ($errors->has("message"))
                            <div class="alert alert-danger text-center" role="alert">
                                   {{$errors->first("message")}}
                            </div>
                     
                        @endif
                        <div class="card-body">
                            <h4 class="card-title mb-4">Login ke akun anda</h4>
                            <form action="{{ route('login') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control" placeholder="Email" name="email" type="email">
                                </div> <!-- form-group// -->
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password">
                                </div> <!-- form-group// -->

                                <div class="form-group">
                                    <a href="#" class="float-right">Forgot password?</a>
                                    <label class="float-left custom-control custom-checkbox"> <input type="checkbox"
                                            class="custom-control-input" name="remember">
                                        <span class="custom-control-label"> Remember </span>
                                    </label>
                                </div> <!-- form-group form-check .// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Login </button>
                                    <button type="button" disabled class="d-none btn btn-primary btn-block">
                                        Logging </button>
                                </div> <!-- form-group// -->
                            </form>
                        </div> <!-- card-body.// -->
                    </div> <!-- card .// -->

                    <p class="text-center mt-4">Belum memiliki akun? <a href="{{ route('register') }}">Registrasi</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- END LISTING LIST -->
@endsection

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
