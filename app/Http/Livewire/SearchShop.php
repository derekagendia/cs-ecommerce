<?php

namespace App\Http\Livewire;

use Livewire\Component;


class SearchShop extends Component
{

    public string $search = '';

    protected $queryString = [
        'search' => ['except' => '']
    ];

    public function render()
    {
        return view('livewire.search-shop');
    }

    public function updateSearch()
    {
        $this->emit('searchUpdated',$this->search);
    }

}
