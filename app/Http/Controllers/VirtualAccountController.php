<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Yajra\DataTables\Facades\DataTables;



class VirtualAccountController extends Controller
{
    //
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $va = Transaction::where('transaction_method_id', 2);
            return DataTables::of($va)
                ->addIndexColumn()
                ->make(true);
        }
        return view('pages.transaction.va', [
            'title' => 'VA Transaction'
        ]);
    }

    public function create()
    {
        $title = 'Create Transaction';
        $lastTransactionId = Transaction::max('id');
        return view('pages.transaction.form', compact('title', 'lastTransactionId'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required|numeric|unique:transactions,id',
            'ref' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_method_id' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Set default user_id to 1
        $data = $request->all();
        $data['user_id'] = 1;
        $data['status'] = 'pending';

        // If validation passes, create the transaction
        Transaction::create($data);

        // Show SweetAlert notification
        Alert::success('Success', 'Transaction created successfully.');

        return redirect()->route('virtual.index');
    }
    public function show(string $id)
    {
        $transaction = Transaction::find($id);
        $transactionLog = TransactionLog::where('transaction_id', $id)->get();
        return view('pages.transaction.detail', [
            'title' => 'Virtual Account Transaction Detail',
            'transactionLog' => $transactionLog,
            'transaction' => $transaction
        ]);
    }

    public function destroy($id)
    {
        // Find the transaction by ID
        $transaction = Transaction::find($id);

        // Check if transaction exists
        if (!$transaction) {
            return redirect()->route('virtual-account')->with('error', 'Transaction not found.');
        }

        // Change the status to "deleted"
        $transaction->status = 'deleted';
        $transaction->save();
        Alert::success('Success', 'Transaction Deleted Successfully');

        return redirect()->route('virtual-account');
    }

    // Metode untuk menampilkan formulir pengeditan
    public function edit($id)
    {
        $transaction = Transaction::findOrFail($id);
        $title = 'Virtual Transaction';
        return view('pages.transaction.edit', compact('transaction', 'title'));
    }

    // Metode untuk menyimpan perubahan
    public function update(Request $request, $id)
    {
        $transaction = Transaction::findOrFail($id);

        // Validasi input
        $validator = Validator::make($request->all(), [
            'ref' => 'required|string|max:255',
            'amount' => 'required|numeric',
            'transaction_method_id' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update transaksi dengan data baru
        $transaction->update([
            'ref' => $request->ref,
            'amount' => $request->amount,
            'transaction_method_id' => $request->transaction_method_id,
            'status' => $request->status,
        ]);
        Alert::success('Success', 'Transaction Updated Successfully');
        // Redirect dengan pesan sukses
        return redirect()->route('virtual.index');
    }
}
