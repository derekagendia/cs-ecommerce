<?php

namespace App\Http\Livewire;

use App\Mail\ShopRequestForActivation;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Livewire\Component;
use App\Models\Shop;
use WireUi\Traits\Actions;

class SaveShop extends Component
{
    use Actions;
    public Shop $shop;

    protected $rules = [
        'shop.name' => 'required|string|min:6',
        'shop.description' => 'required|string|max:500',
    ];

    public function mount()
    {
        $this->shop = new Shop;
    }

    public function save()
    {
        $this->validate();

        $shop = auth()->user()->shop()->create(
            [
                'name' => $this->shop->name,
                'slug' => Str::slug($this->shop->name),
                'description' => $this->shop->description,
            ]
        );

        //send mail to admin

        $admins = User::whereHas('role', function ($q) {
            $q->where('name', 'admin');
        })->get();

        $this->dispatchBrowserEvent('closeModal');

        try {
            Mail::to($admins)->send(new ShopRequestForActivation($shop));


            $this->notification()->notify([
                'title'       => 'Shop saved!',
                'description' => 'Your Shop was successfull saved wait for activation',
                'icon'        => 'success'
            ]);
        } catch (\Exception $error) {
            $this->notification()->notify([
                'title'       => 'Something are wrong',
                'description' => $error->getMessage(),
                'icon'        => 'error'
            ]);
        }

    }

    public function render()
    {
        return view('livewire.save-shop');
    }

}
