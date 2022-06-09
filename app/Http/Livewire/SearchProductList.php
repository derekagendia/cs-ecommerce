<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class SearchProductList extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = ['searchProductUpdated' => 'onSearchProductUpdate'];

    public function render()
    {
        return view('livewire.search-product-list',[
            'products' => \App\Models\Product::where('name','like',"%{$this->search}%")->paginate(8)
        ]);
    }

    public function onSearchProductUpdate($name)
    {
        $this->search = $name;
    }

    public function updating($name,$value)
    {
        if($name === 'search')
        {
            $this->resetPage();
        }
    }

    // pagination customise
    public function paginationView()
    {
        return 'livewire.pagination';
    }

    public function search()
    {
        $this->search = 'iphone';
    }
}
