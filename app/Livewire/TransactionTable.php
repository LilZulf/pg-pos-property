<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class TransactionTable extends Component
{
    use WithPagination;
    public $perPage = 3;
    public $search = '';
    public function render()
    {
        return view('livewire.transaction-table',[
            'transactions' => Transaction::search($this->search)->paginate($this->perPage),
        ]);
    }
}
