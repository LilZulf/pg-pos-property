@extends('layouts.app')

@section('breadcrumb')
    <h4 class="mb-sm-0">Virtual Transaction</h4>
    <div class="page-title-right">
        <ol class="breadcrumb m-0">
            <li class="breadcrumb-item"><a href="/transaction">Transaction</a></li>
            <li class="breadcrumb-item"><a href="/transaction/virtual">Virtual Account</a> </li>
            <li class="breadcrumb-item active">Create Transaction</li>
        </ol>
    </div>
@endsection

@section('content')
    {{-- <div class="row">
        <div class="col-12">
            <livewire:breadcrumb :links="$breadcrumbs" page="Transaction QRIS" />
        </div>
    </div> --}}
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
                    <h4 class="card-title mb-0 flex-grow-1">Create new transaction</h4>
                </div>
                <div class="card-body">
                    <div class="live-preview">
                        <form action="{{ route('virtual.store') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="id" class="form-label">ID</label>
                                        <input name="id" value="{{ $lastTransactionId + 1 }}" type="text"
                                            class="form-control" placeholder="Id" id="id" readonly>
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="rev" class="form-label">Ref</label>
                                        <input name="ref" type="text" class="form-control"
                                            placeholder="Enter your rev" id="rev">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Amount</label>
                                        <input name="amount" type="number" class="form-control"
                                            placeholder="Enter your amount" id="amount">
                                    </div>
                                </div>
                                <!--end col-->
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="ForminputState" class="form-label">Transaction Method ID</label>
                                        <select name="transaction_method_id" id="ForminputState" class="form-select"
                                            data-choices data-choices-sorting="true">
                                            <option value="" selected>Choose...</option>
                                            <option value="1">QRIS</option>
                                            <option value="2">Virtual Account</option>
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
