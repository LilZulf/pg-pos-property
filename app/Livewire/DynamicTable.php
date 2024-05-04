<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;


class DynamicTable extends Component
{
    use WithPagination;

    public $search = '';
    public $perPage = 10;
    public $sortField;
    public $sortAsc = true;
    public $columns;

    public $model;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $query = $this->model::query();

        $query->where('status', '!=', 'deleted');

        $query->where(function ($query) {
            foreach ($this->columns as $index => $column) {
                if ($column['searchable']) {
                    if ($index === 0) {
                        $query->where($column['field'], 'like', '%' . $this->search . '%');
                    } else {
                        $query->orWhere($column['field'], 'like', '%' . $this->search . '%');
                    }
                }
            }
        });

        if ($this->sortField !== null) {
            $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
        } else {
            $query->orderBy('created_at', 'desc'); // Default sorting
        }

        $data = $query->paginate($this->perPage);

        return view('livewire.dynamic-table', compact('data'))
            ->extends('layouts.app')
            ->section('content');
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
        $this->resetPage();
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }

    public function updatedPerPage($value)
    {
        $this->perPage = $value;
        $this->resetPage();
    }
}
