@extends('layouts.admin')

@section('main-content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-4 text-gray-800 text-center text-md-left">Daftar Topup Transaction</h1>

        <!-- Alert -->
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert">&times;</button>
            </div>
        @endif

        <div class="card shadow mb-4">
            <div class="card-header d-flex justify-content-between align-items-center py-3">
                <h6 class="m-0 font-weight-bold text-primary">Manajemen Topup Transaction</h6>
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahModal">
                    <i class="fas fa-plus"></i> Tambah Transaction
                </button>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped align-middle text-center" width="100%" cellspacing="0">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Game</th>
                                <th>Topup Type</th>
                                <th>Jumlah</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th style="width: 150px;">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $index => $transaction)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $transaction->user->name }}</td>
                                    <td>{{ $transaction->topupType->game->name }}</td>
                                    <td>{{ $transaction->topupType->name }}</td>
                                    <td>{{ $transaction->quantity }}</td>
                                    <td>{{ number_format($transaction->total_price, 0, ',', '.') }}</td>
                                    <td>
                                        @if ($transaction->status == 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @elseif ($transaction->status == 'success')
                                            <span class="badge badge-success">Success</span>
                                        @else
                                            <span class="badge badge-danger">Failed</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="d-flex flex-wrap justify-content-center gap-2">
                                            <form action="{{ route('topup_transactions.destroy', $transaction->id) }}"
                                                method="POST" style="display:inline;">
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
                <form action="{{ route('topup_transactions.store') }}" method="POST">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Topup Transaction</h5>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">

                        <!-- User -->
                        <div class="form-group">
                            <label>User</label>
                            @if(auth()->user()->role === 'admin')
                                <select name="user_id" class="form-control" required>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>
                            @else
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <input type="text" class="form-control" value="{{ auth()->user()->name }}" disabled>
                            @endif
                        </div>

                        <!-- Game & Topup Type -->
                        <div class="form-group">
                            <label>Game & Topup Type</label>
                            <select name="topup_type_id" class="form-control" required>
                                @foreach ($topupTypes as $topup)
                                    <option value="{{ $topup->id }}">{{ $topup->game->name }} - {{ $topup->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Jumlah -->
                        <div class="form-group">
                            <label>Jumlah</label>
                            <input type="number" name="quantity" class="form-control" required min="1">
                        </div>

                        <!-- Status -->
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="pending">Pending</option>
                                <option value="success">Success</option>
                                <option value="failed">Failed</option>
                            </select>
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