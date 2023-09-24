<div>
    {{ Breadcrumbs::render('wishlist') }}

    <section>
        <div class="container">
            <div class="row">
                <div class="col-12 table-responsive wishlist">
                    <table class="table table-bordered">
                        <thead>
                            <tr class="text-center">
                                <th scope="col" class="table-secondary">x</th>
                                <th scope="col" class="table-secondary">Gambar</th>
                                <th scope="col" class="table-secondary">Nama Properti</th>
                                <th scope="col" class="table-secondary">Status</th>
                                <th scope="col" class="table-secondary">Harga</th>
                                <th scope="col" class="table-secondary">Agen</th>
                                <th scope="col" class="table-secondary">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                    
                            @forelse ($wishlists as $wishlist)
                                <tr class="align-middle text-center">
                                    <th scope="row">
                                        <a href="#" wire:click="removeToWishlist({{ $wishlist->wishlist_id }})">
                                            <i class="fa fa-trash text-danger"></i>
                                        </a>
                                    </th>
                                    <td class="td-image">
                                        {{-- <div class="d-flex justify-content-center"> --}}
                                        <img src="{{ asset($wishlist->image) }}" alt="" class="w-50">
                                        {{-- </div> --}}
                                    </td>
                                    <td>
                                        <a href="{{ route('frontend.property.view', $wishlist->slug) }}">
                                            {{ $wishlist->name }}
                                        </a>
                                    </td>
                                    <td>
                                        @if ($wishlist->status === 1)
                                            <span class="badge badge-success">Tersedia</span>
                                        @else
                                            <span class="badge badge-danger">Soldout</span>
                                        @endif
                                    </td>
                                    <td>{{ rupiah($wishlist->price) }}</td>
                                    <td>{{ $wishlist->agent }}</td>
                                    <td>
                                        <button class="btn btn-primary text-capitalize">
                                            hubungi
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td>Properti masih kosong</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
</div>

@push('scripts')
    <script src="{{ asset('admin/libs/sweetalert2/sweetalert2.min.js') }}"></script>
    <script>
          document.addEventListener("livewire:init", () => {
          Livewire.on("confirmRemove", ({
                data
            }) => {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.type,
                    showCancelButton: !0,
                    confirmButtonColor: "#e82420",
                    cancelButtonColor: "#8d948b",
                    confirmButtonText: "Hapus",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        Livewire.dispatch("removing")
                    }
                });
            })
          Livewire.on("alert", ({
                data
            }) => {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.type});
            })
        })
    </script>
@endpush
