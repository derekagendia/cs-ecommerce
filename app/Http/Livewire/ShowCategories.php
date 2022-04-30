<?php

namespace App\Http\Livewire;

use Livewire\Component;
use TCG\Voyager\Models\Category;

class ShowCategories extends Component
{
    public function render()
    {
        $data = [
            'category' => Category::orderByDesc('name')->paginate(5)
        ];
        return view('livewire.show-categories',$data);
    }
}
