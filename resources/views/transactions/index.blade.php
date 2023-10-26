@extends('layouts.template')

@section('title', 'Transaction History')

@section('content')
    <div class="mt-4 p-5 bg-primary text-white rounded">
        <h1>Transaction History</h1>
        <a href="{{ route('transactions.create') }}" class="btn btn-light btn-sm">Add New Transaction</a>
    </div>

    <div class="row my-5">
        <div class="col-12 px-5">
            <div class="mb-4 card bg-light">
                <div class="card-body">
                    <h5 class="card-title">Financial Overview</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="card-subtitle mb-2 text-muted">Balance:</h6>
                            <p class="card-text h4 text-primary">{{ number_format($balance, 2) }} Rupiah</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="card-subtitle mb-2 text-muted">Total Income:</h6>
                            <p class="card-text h4 text-success">{{ number_format($totalIncome, 2) }} Rupiah</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="card-subtitle mb-2 text-muted">Total Expense:</h6>
                            <p class="card-text h4 text-danger">{{ number_format($totalExpense, 2) }} Rupiah</p>
                        </div>
                        <div class="col-md-6">
                            <h6 class="card-subtitle mb-2 text-muted">Number of Income Transactions:</h6>
                            <p class="card-text h4">{{ $incomeCount }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="card-subtitle mb-2 text-muted">Number of Expense Transactions:</h6>
                            <p class="card-text h4">{{ $expenseCount }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="row my-5">
        <div class="col-12 px-5">
            <h3 class="mb-4">Transaction List</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Type</th>
                            <th>Category</th>
                            <th>Amount (Rupiah)</th>
                            <th>Notes</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td><a
                                        href="{{ route('transactions.show', $transaction) }}">{{ $transaction->created_at }}</a>
                                </td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ $transaction->category }}</td>
                                <td>{{ number_format($transaction->amount, 2) }}</td>
                                <td>{{ $transaction->notes }}</td>
                                <td>
                                    <a href="{{ route('transactions.edit', $transaction) }}"
                                        class="btn btn-primary btn-sm">Edit</a>
                                    <form action="{{ route('transactions.destroy', $transaction) }}" method="POST"
                                        class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-center">
                    {!! $transactions->links() !!}
                </div>
            </div>
        </div>
    </div>

@endsection
