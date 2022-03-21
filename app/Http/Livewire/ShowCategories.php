<?php

namespace App\Http\Livewire;

use Livewire\Component;
use TCG\Voyager\Models\Category;

class ShowCategories extends Component
{
    public function render()
    {
        $data = [
            'category' => Category::all()
        ];
        return view('livewire.show-categories',$data);
    }
}
