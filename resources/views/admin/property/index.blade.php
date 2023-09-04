@extends('layouts.admin')
@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center">
            @if (session('message'))
                <div class="alert alert-success">{{ session('message') }}</div>
            @endif
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title d-flex justify-content-between mb-2">
                            Properti
                            <a href="{{ route('property.create') }}" class="btn btn-primary waves-effect waves-light">
                                Tambah Properti
                            </a>
                        </h4>

                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                                <thead>
                                    <tr>
                                        <th>Kategori</th>
                                        <th>Gambar</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Agen</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($properties as $property)
                                        <tr class="align-middle text-center">
                                            <td>{{ $property->category->name }}</td>
                                            <td>
                                                <img src="{{ asset($property->propertyImages[0]->image) }}"
                                                    class="rounded" width="220">
                                            </td>
                                            <td>{{ $property->name }}</td>
                                            <td>
                                                @if ($property->status === 1)
                                                    <span class="badge bg-success">
                                                        Aktif
                                                    </span>
                                                @else
                                                    <span class="badge bg-danger">
                                                        Soldout
                                                    </span>
                                                @endif
                                            </td>
                                            <td>
                                                {{ $property->agent->name }}
                                            </td>
                                            <td width="190px">
                                                <div class="row align-items-center">
                                                    <div class="col">
                                                        <a href="{{ route('property.edit', $property->slug) }}"
                                                            class="btn btn-info text-white">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
    
                                                    </div>
                                                    <div class="col">
                                                        <a href="{{ route('property.edit', $property->slug) }}"
                                                            class="btn btn-warning text-white">
                                                            <i class="ri-pencil-line"></i>
                                                        </a>
    
                                                    </div>
                                                    <div class="col"> 
                                                        <form action="{{ route('property.destroy', $property->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger text-white"
                                                                onclick="return confirm('Anda yakin ingin menghapus {{ $property->name }} ?')">
                                                                <i class="ri-delete-bin-line"></i>
                                                            </button>
                                                        </form>
    
                                                    </div>

                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>
                                                <h4>Properti masih Kosong</h4>
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

    </div>
@endsection
