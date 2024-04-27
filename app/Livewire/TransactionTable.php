<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transcation;

class TransactionTable extends Component
{
    use WithPagination;
    public $perPage = 3;
    public function render()
    {
        return view('livewire.transaction-table',[
            'transactions' => Transcation::paginate($this->perPage),
        ]);
    }
}
