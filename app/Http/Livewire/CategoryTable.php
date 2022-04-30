<?php

namespace App\Http\Livewire;

use App\Models\ProductCategory;
use Livewire\Component;
use Livewire\WithPagination;

class CategoryTable extends Component
{
    use WithPagination;

    public $name;

    protected $rules = [
        'name' => 'string|min:4|unique:product_categories',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function addCategory()
    {
        $this->validate();

        ProductCategory::create(['name' => ucfirst($this->name)]);
        $this->reset(['name']);

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success', 'message' => 'Category successfully added.']);

    }

    public function deleteCategory(int $id)
    {
        ProductCategory::find($id)->delete();

        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Category successfully deleted.']);
    }

    public function render()
    {
        return view('livewire.category-table',
            [
                'categories' => ProductCategory::paginate(1)
            ]);
    }

    // pagination customise
    public function paginationView()
    {
        return 'livewire.pagination';
    }

}
