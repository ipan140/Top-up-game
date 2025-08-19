@extends('layouts.admin')

@section('main-content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800 text-center text-md-left">Daftar Topup Type</h1>

    <!-- Alert -->
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert">&times;</button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header d-flex justify-content-between align-items-center py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manajemen Topup Type</h6>
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal">
                <i class="fas fa-plus"></i> Tambah Topup Type
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle text-center" width="100%" cellspacing="0">
                    <thead class="thead-dark">
                        <tr>
                            <th>No</th>
                            <th>Game</th>
                            <th>Nama Topup</th>
                            <th>Price per Unit</th>
                            <th style="width: 150px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($topupTypes as $index => $topup)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $topup->game->name }}</td>
                                <td>{{ $topup->name }}</td>
                                <td>{{ number_format($topup->price_per_unit, 0, ',', '.') }}</td>
                                <td>
                                    <div class="d-flex flex-wrap justify-content-center gap-2">
                                        <button class="btn btn-warning btn-sm mb-1" data-toggle="modal"
                                                data-target="#editModal{{ $topup->id }}">
                                            <i class="fas fa-edit"></i> Edit
                                        </button>
                                        <form action="{{ route('topup_types.destroy', $topup->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm mb-1"
                                                    onclick="return confirm('Yakin ingin menghapus?')">
                                                <i class="fas fa-trash"></i> Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $topup->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <form action="{{ route('topup_types.update', $topup->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h5 class="modal-title">Edit Topup Type</h5>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label>Game</label>
                                                    <select name="game_id" class="form-control" required>
                                                        @foreach ($games as $game)
                                                            <option value="{{ $game->id }}" 
                                                                {{ $topup->game_id == $game->id ? 'selected' : '' }}>
                                                                {{ $game->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Topup</label>
                                                    <input type="text" name="name" class="form-control"
                                                           value="{{ $topup->name }}" required>
                                                </div>
                                                <div class="form-group">
                                                    <label>Price per Unit</label>
                                                    <input type="number" name="price_per_unit" class="form-control"
                                                           value="{{ $topup->price_per_unit }}" required>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-success">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="tambahModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('topup_types.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Topup Type</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>Game</label>
                        <select name="game_id" class="form-control" required>
                            @foreach ($games as $game)
                                <option value="{{ $game->id }}">{{ $game->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nama Topup</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Price per Unit</label>
                        <input type="number" name="price_per_unit" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
