@extends('layouts.template')

@section('title', 'Tentang Transaksi')

@section('content')
    <div class="p-4 p-md-5 mb-4 text-white rounded bg-primary">
        <div class="row mb-2">
            <div class="col-md-6 px-0">
                <h1 class="display-4 fst-italic">Selamat Datang di Transaksi</h1>
                <p class="lead my-3">Kami menyediakan informasi mengenai transaksi dan keuangan Anda.</p>

                <p class="lead mb-0">
                    <a href="#" class="text-white fw-bold">
                        Pelajari lebih lanjut...
                    </a>
                </p>
            </div>
            <div class="col-md-6">

            </div>
        </div>
    </div>

    {{-- Informasi Transaksi --}}
    <div class="row mb-2">
        @forelse ($transactions as $transaction)
            <div class="col-md-6">
                <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary">{{ $transaction->type }}</strong>
                        <h3 class="mb-0">{{ $transaction->category }}</h3>
                        <div class="mb-1 text-muted">{{ $transaction->created_at }}</div>
                        <div class="mb-1 text-muted">Rp. {{ number_format($transaction->amount) }}</div>
                        <p class="card-text mb-auto">{{ Str::limit($transaction->notes, 50, ' ...') }}</p>
                        <a href="{{ route('transactions.show', $transaction) }}" class="stretched-link">Continue reading</a>
                    </div>
                </div>
            </div>
        @empty
            <p>No transactions available.</p>
        @endforelse
    </div>


    </div>
@endsection
