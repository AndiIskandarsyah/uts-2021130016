@extends('layouts.template')

@section('title', 'Transaction Details')

@section('content')
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>Transaction Details</h1>
    </div>

    <div class="row my-5">
        <div class="col-12 px-5">
            <div class="mb-3 col-md-12 col-sm-12">
                <strong>Amount (Rupiah):</strong> {{ $transaction->amount }}
            </div>
            <div class="mb-3 col-md-12 col-sm-12">
                <strong>Type:</strong> {{ $transaction->type }}
            </div>
            <div class="mb-3 col-md-12 col-sm-12">
                <strong>Category:</strong> {{ $transaction->category }}
            </div>
            <div class="mb-3 col-md-12 col-sm-12">
                <strong>Notes:</strong> {{ $transaction->notes ?? 'N/A' }}
            </div>
            <a href="{{ route('transactions.edit', $transaction) }}" class="btn btn-primary">Edit</a>
            <form action="{{ route('transactions.destroy', $transaction) }}" method="POST" class="d-inline">
                @method('DELETE')
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this transaction?')">Delete</button>
            </form>
            <a href="{{ route('transactions.index') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
@endsection
