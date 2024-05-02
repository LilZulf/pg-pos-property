<?php

namespace App\Http\Controllers;

use App\Models\Transcation;
use Illuminate\Http\Request;

class TranscationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Transactions';
        return view('transactions.transaction', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Create';
        return view('transactions.create-transaction', compact('title'));
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transcation $transcation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transcation $transcation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transcation $transcation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transcation $transcation)
    {
        //
    }
}
