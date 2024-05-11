<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class QrisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $qris = Transaction::where('transaction_method_id', 1);
            return DataTables::of($qris)
                ->addIndexColumn()
                ->make(true);
        }
        return view('pages.transaction.qris', [
            'title' => 'QRIS Transaction'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.transaction.form', [
            'title' => 'Create QRIS Transaction'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|unique:transactions,id',
            'ref' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'user_id' => 'required|numeric',
            'transaction_method_id' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('transaction/qris/create')
                ->withErrors($validator)
                ->withInput();
        }

        $qris = Transaction::create($request->all());

        if($qris) {
            return redirect('transaction/qris')->with('success', 'Data has been saved successfully!');
        } else {
            return redirect('transaction/qris/create')->with('error', 'Failed to save data!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $transaction = Transaction::find($id);
        $transactionLog = TransactionLog::where('transaction_id', $id)->get();
        return view('pages.transaction.detail', [
            'title' => 'QRIS Transaction Detail',
            'transactionLog' => $transactionLog,
            'transaction' => $transaction
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
