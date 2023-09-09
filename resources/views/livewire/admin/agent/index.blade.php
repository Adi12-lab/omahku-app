<div class="container-fluid">
    <div class="row justify-content-center">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-lg-10">
            <h4>List Agen</h4>
            <div class="card">
                <div class="card-body">
                    {{-- <p>User dibawah ini hanyalah user biasa tanpa bisa melakukan operasi pada database sedikitpun</p> --}}
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>Pemilik</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($agents as $agent)
                                    <tr>
                                        <td>
                                            {{ $agent->username }}
                                        </td>
                                        <td>{{ $agent->name ?? '---' }}</td>
                                        <td>{{ $agent->email }}</td>
                                        <td>
                                            @if ($agent->status === 1 && $agent->name)
                                                <span class="badge rounded-pill badge-soft-info">Aktif</span>
                                            @else
                                                <span class="badge rounded-pill badge-soft-secondary">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($agent->name)
                                                @if ($agent->status !== 0)
                                                    <button type="button" class="btn btn-warning text-white"
                                                        wire:click="suspend({{ $agent->id }})">
                                                        <i class="mdi mdi-block-helper"></i>
                                                    </button>
                                                @elseif($agent->status === 0)
                                                    <button type="button" class="btn btn-info text-white"
                                                        wire:click="unsuspend({{ $agent->id }})">
                                                        <i class="ri-key-fill"></i>
                                                    </button>
                                                @endif      
                                                <button type="button" class="btn btn-danger text-white"
                                                    wire:click="delete({{ $agent->id }})">
                                                    <i class="ri-delete-bin-line"></i>
                                                </button>
                                            @endif
                                        </td>

                                    </tr>
                                @empty
                                    <tr>
                                        <td>User masih kosong</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>

            </div>
        </div>
        <div class="row">
            {{ $agents->links() }}
        </div>
    </div>
    <!-- end row -->
</div>

@push('script')
    <script>
        document.addEventListener("livewire:init", () => {

            // SUSPEND

            Livewire.on("confirmSuspend", ({
                data
            }) => {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.type,
                    showCancelButton: !0,
                    confirmButtonColor: "#e82420",
                    cancelButtonColor: "#8d948b",
                    confirmButtonText: "Ban",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        Livewire.dispatch("suspending")
                    }
                });
            })

            Livewire.on("confirmUnSuspend", ({
                data
            }) => {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.type,
                    showCancelButton: !0,
                    confirmButtonColor: "#1cbb8c",
                    cancelButtonColor: "#8d948b",
                    confirmButtonText: "Ya, Aktifkan",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        Livewire.dispatch("unsuspending")
                    }
                });
            })
            
            Livewire.on("confirmDelete", ({
                data
            }) => {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.type,
                    showCancelButton: !0,
                    confirmButtonColor: "#e82420",
                    cancelButtonColor: "#8d948b0",
                    confirmButtonText: "Ya, Hapus",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        Livewire.dispatch("deleting")
                    }
                });
            })

            Livewire.on("alert", ({
                data
            }) => {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.type
                })
            })


        })
    </script>
@endpush
