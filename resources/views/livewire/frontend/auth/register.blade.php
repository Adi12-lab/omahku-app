<div>
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
                            <form wire:submit="save">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" placeholder="Username anda" wire:model="username">
                                    <small class="text-danger">@error("username") {{$message}} @enderror</small>
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" placeholder="Email anda" wire:model="email">
                                    <small class="text-danger">@error("email") {{$message}} @enderror</small>
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Buat password</label>
                                    <input class="form-control" type="password" wire:model="password">
                                    <small class="text-danger">@error("password") {{$message}} @enderror</small>
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <label>Konfirmasi password</label>
                                    <input class="form-control" type="password" wire:model="password_confirmation">
                                    <small class="text-danger">@error("password_confirmation") {{$message}} @enderror</small>
                                </div> <!-- form-group end.// -->
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-block"> Registrasi </button>
                                </div> <!-- form-group// -->
                            
                            </form>
                        </div><!-- card-body.// -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- END LISTING LIST -->
</div>
