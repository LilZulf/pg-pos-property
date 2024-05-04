@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12">
            <livewire:breadcrumb :links="$breadcrumbs" page="Edit Transaction" />
        </div>
    </div>
    <div class="alert alert-danger" role="alert" style="{{ $errors->any() ? '' : 'display:none' }}">
        <strong>Error:</strong> Please fix the following errors:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    <div class="row">
        <div class="col-xxl-12">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Edit Transaction data</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('transaction-update', $transaction->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="ref" class="form-label">Ref</label>
                                        <input name="ref" type="text" class="form-control"
                                            value="{{ $transaction->ref }}" placeholder="Enter your ref" id="ref">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input name="amount" type="number" class="form-control"
                                            value="{{ $transaction->amount }}" placeholder="Enter your amount"
                                            id="amount">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="transaction_method_id" class="form-label">Transaction Method ID</label>
                                        <select name="transaction_method_id" id="transaction_method_id" class="form-select"
                                            data-choices data-choices-sorting="true">
                                            <option value="" selected>Choose...</option>
                                            <option value="1"
                                                {{ $transaction->transaction_method_id == 1 ? 'selected' : '' }}>Bank
                                                Mandiri</option>
                                            <option value="2"
                                                {{ $transaction->transaction_method_id == 2 ? 'selected' : '' }}>Bank BCA
                                            </option>
                                            <option value="3"
                                                {{ $transaction->transaction_method_id == 3 ? 'selected' : '' }}>Bank BNI
                                            </option>
                                            <option value="4"
                                                {{ $transaction->transaction_method_id == 4 ? 'selected' : '' }}>Bank BRI
                                            </option>
                                            <option value="5"
                                                {{ $transaction->transaction_method_id == 5 ? 'selected' : '' }}>Bank CIMB
                                                Niaga</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="status" class="form-label">Status</label>
                                        <select name="status" class="form-select" data-choices data-choices-sorting="true">
                                            <option value="" selected>Choose status...</option>
                                            <option value="Pending"
                                                {{ $transaction->status === 'Pending' ? 'selected' : '' }}>
                                                Pending</option>
                                            <option value="Completed"
                                                {{ $transaction->status === 'Completed' ? 'selected' : '' }}>
                                                Completed
                                            </option>
                                            <option value="Cancelled"
                                                {{ $transaction->status === 'Cancelled' ? 'selected' : '' }}>
                                                Cancelled
                                            </option>

                                        </select>
                                    </div>
                                </div>

                                <!--end col-->
                                <div class="col-lg-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                                <!--end col-->
                            </div>
                            <!--end row-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
