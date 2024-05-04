<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


class TransactionController extends Controller
{
    //
    public function index()
    {
        $breadcrumbs = [
            ['name' => 'Transaction', 'url' => '/transaction'],
            ['name' => 'Virtual Account', 'url' => '/transaction/virtual-account'],
        ];

        $columns = [
            ['name' => 'ID', 'field' => 'id', 'searchable' => true],
            ['name' => 'Referensi', 'field' => 'ref', 'searchable' => true],
            ['name' => 'Created At', 'field' => 'created_at', 'searchable' => true],
            ['name' => 'Status', 'field' => 'status', 'searchable' => true],
            ['name' => 'Jumlah', 'field' => 'amount', 'searchable' => true],
            ['name' => 'User ID', 'field' => 'user_id', 'searchable' => true],
            ['name' => 'Metode Transaksi', 'field' => 'transaction_method_id', 'searchable' => true],
            ['name' => 'Action', 'field' => 'action', 'searchable' => false],
        ];

        $data = Transaction::class;


        $title = 'Transaction VA';

        $confirmTitle = 'Delete Data!';
        $text = "Are you sure you want to delete?";
        confirmDelete($confirmTitle, $text);

        return view('transactions.transaction-va', compact('breadcrumbs', 'title', 'data', 'columns'));
    }

    public function create()
    {
        $breadcrumbs = [
            ['name' => 'Transaction', 'url' => '/transaction'],
            ['name' => 'Virtual Account', 'url' => '/transaction/virtual'],
            ['name' => 'Create', 'url' => '/transaction/virtual/create-transaction'],
        ];
        $title = 'Create Transaction';
        $lastTransactionId = Transaction::max('id');
        return view('transactions.create-transaction', compact('title', 'lastTransactionId', 'breadcrumbs'));
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
        $data['status'] = 'Pending';

        // If validation passes, create the transaction
        Transaction::create($data);

        // Show SweetAlert notification
        Alert::success('Success', 'Transaction created successfully.');

        return redirect()->route('virtual-account');
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
        $breadcrumbs = [
            ['name' => 'Transaction', 'url' => '/transaction'],
            ['name' => 'Virtual Account', 'url' => '/transaction/virtual'],
            ['name' => 'Trasaction number : ' . $id, 'url' => '/transaction/virtual/create-transaction'],
        ];
        $title = 'Update Transaction';
        return view('transactions.edit-transaction', compact('transaction', 'breadcrumbs', 'title'));
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
        return redirect()->route('virtual-account');
    }
}
