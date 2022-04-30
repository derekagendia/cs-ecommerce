<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shop;
use Livewire\WithPagination;

class ShopList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.shop-list',[
            'shops' => Shop::paginate(8)
        ]);
    }

    public function onSearchUpdate($name)
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

}
