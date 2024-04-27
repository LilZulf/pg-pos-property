<!-- transaction.blade.php -->
@extends('layouts.app')

@php
    $title = 'Virtual Account Transaction';
@endphp

@section('content')
    <x-card :title="$title">
        <x-slot name="content">
            <x-dataTable>

            </x-dataTable>
        </x-slot>
    </x-card>
@endsection

