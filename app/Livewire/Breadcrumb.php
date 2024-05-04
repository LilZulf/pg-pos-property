<?php

namespace App\Livewire;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $links = [];
    public $page = '';

    public function mount($links, $page)
    {
        $this->links = $links;
    }
    public function render()
    {
        return view('livewire.breadcrumb');
    }
}
