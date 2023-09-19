<!-- sample modal content -->
<div id="addCategoryModal" wire:ignore.self class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="save">
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="Wisma Andari" id="name"
                                    wire:model.defer="name">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="name" class="col-sm-2 col-form-label">Slug</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="wisma-andari" id="name"
                                    wire:model.defer="slug">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label">
                                Aktif
                            </label>
                            {{-- Id membuaat input fade --}}
                            <div class="col-sm-10">
                                <input class="form-check-input mt-2" type="checkbox" checked wire:model.defer="status">
                            </div>
                        </div>
                        <div class="row mb-3">

                            <div class="col-12">
                                <label for="description" class="col-12 col-form-label">Gambar</label>
                            </div>
                            <div class="col-12">

                                @if ($image)
                                    <img wire:loading.remove wire:target="image" src="{{ $image->temporaryUrl() }}"
                                        height="200" width="300" alt="image_floor">
                                @else
                                    <img wire:loading.remove wire:target="image"
                                        src="{{ asset('assets/images/600x400.jpg') }}" height="200" width="300"
                                        alt="image_floor">
                                @endif
                                <div wire:loading wire:target="image" class="p-2">
                                    <div class="spinner-border text-primary" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>Loading...
                                </div>
                                <input type="file" class="form-control" wire:model="image">
                                @error('photo')
                                    <small class="danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light waves-effect" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Tambah</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- sample modal content -->
<div id="updateCategoryModal" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Update Kategori</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div wire:loading class="p-2">
                <div class="spinner-border text-primary" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>Loading...
            </div>
            <div wire:loading.remove>
                <form wire:submit.prevent="update">
                    <div class="modal-body">
                        <div class="container">
                            <div class="row mb-3">
                                <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Wisma" id="name"
                                        wire:model.defer="name">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label class="col-sm-2 col-form-label">
                                    Aktif
                                </label>
                                {{-- Id membuaat input fade --}}
                                <div class="col-sm-10">
                                    <input class="form-check-input mt-2" type="checkbox" wire:model.defer="status">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light waves-effect"
                            data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-warning waves-effect waves-light">Update</button>
                    </div>
                </form>

            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('script')
    <script>
        document.addEventListener('livewire:init', () => {
            window.addEventListener("close-modal", event => {
                $("#addCategoryModal").modal("hide");
                $("#updateCategoryModal").modal("hide");
            })

            Livewire.on("deletetingCategory", ({
                data
            }) => {
                Swal.fire({
                    title: "Anda Yakin?",
                    text: "Anda akan menghapus kategori " + data.name,
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#1cbb8c",
                    cancelButtonColor: "#e66060",
                    confirmButtonText: "Yes, delete it!",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        Livewire.dispatch("destroyCategory")
                    }
                });
            })
        })
    </script>
@endpush
