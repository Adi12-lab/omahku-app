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
                                    <th>Nama</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($features as $feature)
                                    <tr>
                                        <td>{{ $feature->name }}</td>
                                        <td>
                                            <button type="button" class="btn btn-warning text-white" wire:click="edit({{$feature->id}})" data-bs-target="#updateFeatureModal" data-bs-toggle="modal">
                                                <i class="ri-pencil-line"></i> 
                                            </button>
                                            <button type="button" class="btn btn-danger text-white" wire:click="delete({{$feature->id}})">
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
        <div class="row">
            {{$features->links()}}
        </div>
    </div>
    <!-- end row -->
    @include('livewire.admin.feature.modal-form')
</div>
