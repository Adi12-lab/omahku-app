<div class="container-fluid">
    <div class="row justify-content-center">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <div class="col-lg-10">
            <form class="d-flex mb-3" wire:submit="query">
                <input type="text" class="form-control w-50" placeholder="Cari Username, Email" wire:model="search">
                <button type="submit" class="btn btn-secondary waves-effect waves-light ms-2">Search</button>
            </form>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title d-flex justify-content-between mb-2">
                        User Guest
                    </h4>
                    {{-- <p>User dibawah ini hanyalah user biasa tanpa bisa melakukan operasi pada database sedikitpun</p> --}}
                    <div class="table-responsive">
                        <table class="table mb-0">

                            <thead class="table-light">
                                <tr>
                                    <th>Jabatan</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>
                                            @if ($user->role_as === 1)
                                                <span class="badge bg-success">
                                                    Agent
                                                </span>
                                            @else
                                                <span class="badge bg-secondary">
                                                    Guest
                                                </span>
                                            @endif
                                        </td>
                                        <td>{{ $user->username }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @if ($user->status === 1)
                                                <span class="badge rounded-pill badge-soft-info">Aktif</span>
                                            @else
                                                <span class="badge rounded-pill badge-soft-secondary">Nonaktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($user->role_as !== 1)
                                                <button type="button" class="btn btn-success text-white"
                                                    wire:click="promoteToAgent({{ $user->id }})">
                                                    <i class="ri-arrow-up-fill"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-secondary text-white"
                                                    wire:click="downgrade({{ $user->id }})">
                                                    <i class="ri-arrow-down-fill"></i>
                                                </button>
                                            @endif
                                            @if ($user->status !== 0)
                                                <button type="button" class="btn btn-warning text-white"
                                                    wire:click="suspend({{ $user->id }})">
                                                    <i class="mdi mdi-block-helper"></i>
                                                </button>
                                            @else
                                                <button type="button" class="btn btn-info text-white"
                                                    wire:click="unsuspend({{ $user->id }})">
                                                    <i class="ri-key-fill"></i>
                                                </button>
                                            @endif
                                            <button type="button" class="btn btn-danger text-white"
                                                wire:click="delete({{ $user->id }})">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
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
            {{ $users->links() }}
        </div>
    </div>
    <!-- end row -->
</div>

@push('script')
    <script>
        document.addEventListener("livewire:init", () => {
            Livewire.on("confirmToAgent", ({
                data
            }) => {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.type,
                    showCancelButton: !0,
                    confirmButtonColor: "#1cbb8c",
                    cancelButtonColor: "#e66060",
                    confirmButtonText: "Ya, Promosikan",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        Livewire.dispatch("promotingToAgent")
                    }
                });
            })

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

            Livewire.on("confirmDowngrade", ({
                data
            }) => {
                Swal.fire({
                    title: data.title,
                    text: data.text,
                    icon: data.type,
                    showCancelButton: !0,
                    confirmButtonColor: "#e6ca17",
                    cancelButtonColor: "#8d948b",
                    confirmButtonText: "Ya, Turunkan",
                }).then(function(result) {
                    if (result.isConfirmed) {
                        Livewire.dispatch("downgrading")
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
