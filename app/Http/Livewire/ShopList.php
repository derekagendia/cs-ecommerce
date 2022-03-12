<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Shop;
use Livewire\WithPagination;

class ShopList extends Component
{
    use WithPagination;

    public $search = '';

    protected $listeners = ['searchUpdated' => 'onSearchUpdate'];

    public function render()
    {
        return view('livewire.shop-list',[
            'shops' => Shop::where('name','like',"%{$this->search}%")->where('is_active',1)->paginate(5)
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
