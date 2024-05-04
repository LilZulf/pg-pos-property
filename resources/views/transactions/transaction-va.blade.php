@extends('layouts.app')
@section('title')
    Page Title
@endsection
@section('css')
    <!-- your page css file -->
@endsection
@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="alert alert-danger" role="alert" style="{{ $errors->any() ? '' : 'display:none' }}">
                <strong>Error:</strong> Please fix the following errors:
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            <livewire:breadcrumb :links="$breadcrumbs" page="Transaction VA" />
            <div class="card">
                <div class="card-header">
                    <div class="d-flex flex-row align-items-center justify-content-between">
                        <h5 class="card-title mb-0">List data virtual account</h5>
                        <x-primary-button onclick="window.location.href='{{ route('transaction-create') }}'"
                            class="btn btn-success waves-effect waves-light">
                            Tambah data
                        </x-primary-button>
                    </div>

                </div>
                <div class="card-body">
                    <livewire:dynamic-table :columns="$columns" :model="$data" />
                </div>
            </div>
        </div><!--end col-->
    </div><!--end row-->
@endsection

@section('content')
    <!-- your page script here -->
@endsection
