<!-- sample modal content -->
<div id="addFloorModal" wire:ignore.self class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Tambah Lantai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="save">
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <label for="size" class="col-sm-2 col-form-label">Size</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="643 m2" id="size"
                                    wire:model.defer="size">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" placeholder="Wisma" id="description" rows="7" wire:model.defer="description">
                                </textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                           
                            <div class="col-12">
                                <label for="description" class="col-12 col-form-label">Gambar</label>
                               
                                <div class="col-12">

                                    @if ($image)
                                        <img wire:loading.remove wire:target="image" src="{{ $image->temporaryUrl() }}" height="200" width="300" alt="image_floor">
                                    @else
                                        <img wire:loading.remove wire:target="image" src="{{ asset('assets/images/600x400.jpg') }}" height="200" width="300" alt="image_floor">
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
<div id="updateFloorModal" wire:ignore.self class="modal fade" tabindex="-1" role="dialog"
    aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="myModalLabel">Edit Lantai</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form wire:submit.prevent="update">
                <div class="modal-body">
                    <div class="container">
                        <div class="row mb-3">
                            <label for="size" class="col-sm-2 col-form-label">Size</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="text" placeholder="643 m2" id="size"
                                    wire:model.defer="size">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" placeholder="Wisma" id="description" rows="7" wire:model.defer="description">
                                </textarea>
                            </div>
                        </div>

                        <div class="row mb-3">     
                            <div class="col-12">
                            <label for="description" class="col-12 col-form-label">Gambar</label>
                           
                            <div class="col-12">

                                @if ($image)
                                    <img wire:loading.remove wire:target="image" src="{{ $image->temporaryUrl() }}" height="200" width="300" alt="image_floor">
                                @else
                                    <img wire:loading.remove wire:target="image" src="{{ asset($previous_image) }}" height="200" width="300" alt="image_floor">
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
                    <button type="submit" class="btn btn-warning waves-effect waves-light">Update</button>
                </div>

            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


@push('script')
    <script>
        document.addEventListener('livewire:init', () => {
            window.addEventListener("close-modal", event => {
                $("#addFloorModal").modal("hide");
                $("#updateFloorModal").modal("hide");
                window.location.reload();
            })

            Livewire.on("deletingFloor", () => {
                Swal.fire({
                    title: "Anda Yakin?",
                    text: "Lantai ini akan dihapus ",
                    icon: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#1cbb8c",
                    cancelButtonColor: "#e66060",
                    confirmButtonText: "Yes, Hapus!",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        Livewire.dispatch("destroyFloor")
                    }
                });
            })
        })
    </script>
@endpush
