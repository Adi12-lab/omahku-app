<div>
{{Breadcrumbs::render("contact")}}
    <section class="wrap__contact-form">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h5>Hubungi Kami</h5>
                    <form class="row" wire:submit.prevent="send">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama <span class="required"></span></label>
                                <input type="text" class="form-control" wire:model.defer="sender_name" required>
                                @error("name") <small class="text-danger"> {{$message}} </small>  @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email <span class="required"></span></label>
                                <input type="email" class="form-control" wire:model.defer="sender_email">
                                @error("email") <small class="text-danger"> {{$message}} </small>  @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Telepon (optional)</label>
                                <input type="text" class="form-control" wire:model.defer="sender_phone">
                                @error("phone") <small class="text-danger"> {{$message}} </small>  @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Subjek <span class="required"></span></label>
                                <input type="text" class="form-control" wire:model.defer="subject">
                                @error("subject") <small class="text-danger"> {{$message}} </small>  @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Pesan Anda </label>
                                <textarea class="form-control" rows="9" wire:model.defer="sender_message"></textarea>
                                @error("message") <small class="text-danger"> {{$message}} </small>  @enderror
                            </div>
                            <div class="form-group float-right mb-0">
                                <button type="submit" wire:loading.remove class="btn btn-primary btn-contact">Submit</button>
                                <button type="button" wire:loading class="btn btn-primary btn-contact">
                                    <div class="spinner-border" role="status">
                                        <span class="sr-only">Loading...</span>
                                      </div>
                                </button>
                             
                            </div>
                        </div>
                    </form>
                </div>
    
    
                <div class="col-md-4">
                    <div class="wrap__contact-open-hours">
                        <h5 class="text-capitalize">open hours</h5>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-center justify-content-between"><span>Monday - Friday</span>
                                <span>09 AM - 19 PM</span></li>
                            <li class="d-flex align-items-center justify-content-between"><span>Saturday</span> <span>09
                                    AM - 14 PM</span></li>
                            <li class="d-flex align-items-center justify-content-between"><span>Sunday</span>
                                <span>Closed</span></li>
                        </ul>
                    </div>
                    <h5>Info location</h5>
                    <div class="wrap__contact-form-office">
                        <ul class="list-unstyled">
                            <li>
                                <span>
                                    <i class="fa fa-home"></i>
                                </span>
    
                                PO Box 16122 Collins Street West Victoria
                                8007 Australia
    
    
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-phone"></i>
                                    <a href="tel:">(+12) 34567 890 123</a>
                                </span>
    
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-envelope"></i>
                                    <a href="mailto:">mail@example.com</a>
                                </span>
    
                            </li>
                            <li>
                                <span>
                                    <i class="fa fa-globe"></i>
                                    <a href="#" target="_blank"> www.yourdomain.com</a>
                                </span>
                            </li>
                        </ul>
    
                        <div class="social__media">
                            <h5>find us</h5>
                            <ul class="list-inline">
    
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white facebook">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white twitter">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white whatsapp">
                                        <i class="fa fa-whatsapp"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white telegram">
                                        <i class="fa fa-telegram"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="btn btn-social rounded text-white linkedin">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@push("scripts")

<script>
    document.addEventListener("livewire:init", function() {
        Livewire.on("success", function() {
            Swal.fire("Berhasil", "Pesan anda berhasil dikirm", "success")
        })
    })
</script>

@endpush