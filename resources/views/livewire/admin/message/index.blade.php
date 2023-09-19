<div class="container-fluid">
    <div class="row" id="new-message">

        {{-- <div class="col-lg-6">
            <div class="card border border-success">
                <div class="card-header bg-transparent border-success">
                    <h5 class="my-0 text-success"><i class="mdi mdi-check-all me-3"></i>Pesan Baru</h5>
                </div>
                <div class="card-body">
                    <p><strong>Subjek </strong><span class="ms-2 me-2">: </span> Perkenalan</p>

                    <p><strong>Nama </strong><span class="ms-2 me-2">: </span>Adi</p>
                    <p><strong>Email </strong><span class="ms-2 me-2">: </span> adi@gmail.com</p>
                    <p><strong>Phone </strong><span class="ms-2 me-2">: </span>085232517546</p>
                    <strong>Pesan </strong><span class="ms-2">: </span>
                    <p class="card-text">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab hic ratione cum vero quidem amet
                        velit sequi sint neque, blanditiis magnam, pariatur tempora unde maxime doloremque optio eveniet
                        quod nam!
                    </p>
                    <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                </div>
            </div>
        </div> --}}
        
    </div>
    <div class="row" id="old-message">
        @forelse($messages as $message)
        <div class="col-lg-6">
            <div class="card">
                <div class="card-body">
                    <p><strong>Subjek </strong><span class="ms-2 me-2">: </span> {{$message->subject}}</p>

                    <p><strong>Nama </strong><span class="ms-2 me-2">: </span>{{$message->name}}</p>
                    <p><strong>Email </strong><span class="ms-2 me-2">: </span>{{$message->email}}</p>
                    <p><strong>Phone </strong><span class="ms-2 me-2">: </span>{{$message->phone}}</p>
                    <strong>Pesan </strong><span class="ms-2">: </span>
                    <p class="card-text">
                        {{$message->message}}
                    </p>
                    <p class="card-text"><small class="text-muted">Last updated {{$message->sended_at}}</small></p>
                </div>
            </div>
        </div>
        @empty
        <h4>Kotak Pesan masih Kosong</h4>
        @endforelse
    </div>
</div>
{{-- 
@push('script')
    <script>
        if (window.userId) {
            window.Echo.private(`users.${window.userId}`).listen(
                "MessageDelivered",
                (event) => {
                    console.log("berhasil listen ke pusher");
                    console.log(event);
                }
            );
        }
    </script>
@endpush --}}
