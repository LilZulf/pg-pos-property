<!-- transaction.blade.php -->
@extends('layouts.app')

@php
    $title = 'Virtual Account Transaction';
    $costumers = [
    [
        'no' => 1,
        'date_time' => '2024-04-27',
        'order_id' => 'ORD123456',
        'transaction_type' => 'Virtual Account',
        'channel' => 'assets/images/bank/bni.png',
        'status' => 'Success',
        'amount' => '100.000',
        'customer_email' => 'customer1@example.com',
    ],
    [
        'no' => 2,
        'date_time' => '2024-04-28',
        'order_id' => 'ORD789012',
        'transaction_type' => 'Virtual Account',
        'channel' => 'assets/images/bank/mandiri.png',
        'status' => 'Pending',
        'amount' => '50.000',
        'customer_email' => 'customer2@example.com',
    ],
    [
        'no' => 3,
        'date_time' => '2024-04-29',
        'order_id' => 'ORD999856',
        'transaction_type' => 'Virtual Account',
        'channel' => 'assets/images/bank/bri.png',
        'status' => 'Success',
        'amount' => '500.000',
        'customer_email' => 'customer3@example.com',
    ]
];
@endphp

@section('content')
    <x-card :title="$title">
        <x-slot name="content">
            <x-dataTable :costumers="$costumers"></x-dataTable>
        </x-slot>
    </x-card>
@endsection

