
<div class="container-fluid">
    <div class="row justify-content-center">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-between flex-wrap mb-2">
                        Lantai Properti {{$property->name}}
                        <button type="button" class="btn btn-primary waves-effect waves-light" 
                        data-bs-target="#addFloorModal" data-bs-toggle="modal">
                            Tambah Lantai
                        </button>
                    </h4>
                  
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                                <tr>
                                    <th>Gambar</th>
                                    <th>Deskripsi</th>
                                    <th>Size</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                             
                                @forelse($property_floors as $floor)
                                    <tr class="align-middle text-center" wire:key="{{str()->random(10)}}">
                                        <td>
                                            <img src="{{ asset($floor->image) }}" class="rounded" width="220">
                                        </td>
                                        <td>{{ $floor->description }}</td>
                                        <td>
                                            {{ $floor->size }}
                                        </td>
                                        <td width="190px">
                                            <div class="row align-items-center">
                                                <div class="col">
                                                    <button type="button" class="btn btn-warning text-white" wire:click="edit({{$floor->id}})" data-bs-target="#updateFloorModal" data-bs-toggle="modal">
                                                        <i class="ri-image-fill"></i>
                                                    </button>
                                                </div>
                                                <div class="col">
                                                    <button type="submit" class="btn btn-danger text-white" wire:click="delete({{$floor->id}})">
                                                        <i class="ri-delete-bin-line"></i>
                                                    </button>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>
                                            <h4>Lantai Properti masih Kosong</h4>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
   
    @include("livewire.admin.property-floor.modal-form")
</div>
