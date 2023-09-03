<div class="container-fluid">
    <div class="row justify-content-center">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-between mb-2">
                        Fasilitas
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-bs-toggle="modal"
                            data-bs-target="#addFeatureModal">
                            Tambah Fasilitas
                        </button>
                    </h4>
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($categories as $category)
                                    <tr>
                                        <th scope="row">{{$loop->iteration}}</th>
                                        <td>{{ $category->name }}</td>
                                        <td>
                                            @if ($category->status === 1)
                                                <span class="badge bg-success">
                                                    Aktif
                                                </span>
                                            @else
                                                <span class="badge bg-info">
                                                    Diarsipkan
                                                </span>
                                            @endif
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-warning text-white" wire:click="edit({{$category->id}})" data-bs-target="#updateFeatureModal" data-bs-toggle="modal">
                                                <i class="ri-pencil-line"></i> 
                                            </button>
                                            <button type="button" class="btn btn-danger text-white" wire:click="delete({{$category->id}})">
                                                <i class="ri-delete-bin-line"></i> 
                                            </button>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td>Fasilitas masih kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- end row -->
    @include('livewire.admin.feature.modal-form')
</div>
