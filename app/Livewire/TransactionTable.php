<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class TransactionTable extends Component
{
    use WithPagination;


    #[Url(history:true)]
    public $perPage = 3;
    #[Url(history:true)]
    public $search = '';
    public function render()
    {
        return view('livewire.transaction-table',[
            'transactions' => Transaction::search($this->search)->paginate($this->perPage),
        ]);
    }
}
