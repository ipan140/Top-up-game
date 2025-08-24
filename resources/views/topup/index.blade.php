@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg p-4">
        <div class="text-center mb-4">
            <img src="{{ $game->image }}" alt="{{ $game->name }}" width="120">
            <h2 class="mt-3">{{ $game->name }}</h2>
            <p class="text-muted">Pilih nominal top up untuk {{ $game->name }}</p>
        </div>

        <div class="row">
            @foreach($topups as $topup)
                <div class="col-md-3 mb-4">
                    <div class="card h-100 shadow-sm border-0">
                        <div class="card-body text-center">
                            <h6 class="mt-2">{{ $topup->name }}</h6>
                            <p class="fw-bold text-primary mt-2">
                                Rp {{ number_format($topup->price_per_unit, 0, ',', '.') }}
                            </p>
                            <button class="btn btn-sm btn-primary">Beli</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
