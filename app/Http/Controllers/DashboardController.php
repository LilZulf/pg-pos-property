<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $transactions = Transaction::query();

        // Filter berdasarkan rentang tanggal jika rentang tanggal dipilih
        if ($request->has('date_range')) {
            // Pisahkan rentang tanggal menjadi tanggal awal dan akhir
            $dateRange = explode(' to ', $request->input('date_range'));
            $startDate = date('Y-m-d', strtotime($dateRange[0]));
            $endDate = date('Y-m-d', strtotime($dateRange[1]));

            // Terapkan filter rentang tanggal
            $transactions->whereBetween('created_at', [$startDate, $endDate]);
        }

        // Ambil data transaksi setelah diterapkan filter (jika ada)
        $filtered_transactions = $transactions->get();

        // ambil transaksi terakhir
        $latest_transactions = $transactions->latest()->take(5)->get();

        // 
        $total_transactions = $filtered_transactions->count();
        $completed = $filtered_transactions->where('status', 'completed')->count();
        $failed = $filtered_transactions->where('status', 'failed')->count();
        $pending = $filtered_transactions->where('status', 'pending')->count();

        // 
        $va = $filtered_transactions->where('transaction_method_id', 2)->count();
        $qris = $filtered_transactions->where('transaction_method_id', 1)->count();

        $title = 'General Dashboard';
        $now = $request->has('date_range') ? $request->input('date_range') : date('d M Y');


        $months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'];


        $pending_data = [];
        $failed_data = [];
        $completed_data = [];

        foreach ($months as $month) {
            $pending_data[] = $filtered_transactions->where('status', 'pending')->filter(function ($transaction) use ($month) {
                return date('M', strtotime($transaction->created_at)) === $month;
            })->count();

            $failed_data[] = $filtered_transactions->where('status', 'failed')->filter(function ($transaction) use ($month) {
                return date('M', strtotime($transaction->created_at)) === $month;
            })->count();

            $completed_data[] = $filtered_transactions->where('status', 'completed')->filter(function ($transaction) use ($month) {
                return date('M', strtotime($transaction->created_at)) === $month;
            })->count();
        }

        return view(
            'dashboard.general',
            compact(
                'title',
                'filtered_transactions',
                'total_transactions',
                'completed',
                'failed',
                'pending',
                'now',
                'pending_data',
                'failed_data',
                'completed_data',
                'months',
                'va',
                'qris',
                'latest_transactions'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
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
    public function show(string $id)
    {
        //
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

    /**
     * Show the 404 page.
     */
    public function notFound()
    {
        $title = '404';
        return view('layouts.404', compact('title'));
    }

    public function searchResult()
    {
        $title = 'Search Result';
        return view('pages.search-result', compact('title'));
    }

    public function datatable()
    {
        $title = 'Datatable';
        return view('pages.datatable', compact('title'));
    }

    public function faq()
    {
        $title = 'FAQ';
        return view('pages.faq', compact('title'));
    }

    public function form()
    {
        $title = 'Form';
        return view('pages.form', compact('title'));
    }

    public function qris()
    {
        $title = 'QRIS';
        return view('pages.transaction.qris', compact('title'));
    }
}
