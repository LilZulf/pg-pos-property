<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'General Dashboard';
        return view('dashboard.general', compact('title'));
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
}
