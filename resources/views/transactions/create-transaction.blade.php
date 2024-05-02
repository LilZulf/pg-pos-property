@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between bg-galaxy-transparent">
            <h4 class="mb-sm-0">Create Transaction</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Transaction</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="javascript: void(0);">Virtual Account</a>
                    </li>
                    <li class="breadcrumb-item active">create</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<div class="alert alert-danger" role="alert">
    This is <strong>Create Transaction</strong> page Please fill in the <b>inputs </b> in the form below!
</div>
<div class="row">
    <div class="col-xxl-12">
        <div class="card">
        <div class="card-header align-items-center d-flex">
                                    <h4 class="card-title mb-0 flex-grow-1">Create new transaction</h4>
                                </div>
            <div class="card-body">
                <div class="live-preview">
                    <form action="javascript:void(0);">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="id" class="form-label">ID</label>
                                    <input type="text" class="form-control" placeholder="Id" id="id">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="rev" class="form-label">Ref</label>
                                    <input type="text" class="form-control" placeholder="Enter your rev" id="rev">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="amount" class="form-label">Amount</label>
                                    <input type="number" class="form-control" placeholder="Enter your amount" id="amount">
                                </div>
                            </div>
                            <!--end col-->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="ForminputState" class="form-label">Transaction Method ID</label>
                                    <select id="ForminputState" class="form-select" data-choices data-choices-sorting="true">
                                        <option selected>Choose...</option>
                                        <option>method 1</option>
                                        <option>method 2</option>
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
