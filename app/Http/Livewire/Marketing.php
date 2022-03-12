<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Product as Produit;

class Marketing extends Component
{
    use WithFileUploads;

    public $photo;
    public int $category_id = 1;
    public int $product_id = 1;

    protected $rules = [
        'photo' => 'image|max:1024', // 1MB Max
    ];
    public function render()
    {
        return view('livewire.marketing',[
            'productsNotNull' => Produit::whereNotNull('cover_img')->get(),
            'products' => Produit::all(),
        ]);
    }

    public function save()
    {
        $this->validate();

        if($this->onlyThreeSlide()){
            $name = $this->photo->getClientOriginalName();
            $path =  $this->photo->storeAs('photos',time() . $name,'public');

            $addImageUrl = Produit::find($this->product_id);

            $addImageUrl->image_url = '/storage/'.$path;

            $addImageUrl->save();

            $this->dispatchBrowserEvent(
                'alert', ['type' => 'success',  'message' => 'Slide successfully added.']);
        }else {

            //message flash ici
            $this->dispatchBrowserEvent(
                'alert', ['type' => 'success',  'message' => 'Sorry you can add only 3 slides.']);
        }

    }

    private function onlyThreeSlide() : bool
    {
        $imageUrl = Produit::whereNotNull('cover_img')->count();

        if($imageUrl >= 3){
            return false;
        }

        return true;
    }

    public function deleteSlide(int $id)
    {
        $slideProduct = Produit::find($id);

        $slideProduct->cover_img = null;

        $slideProduct->save();

        //message flash
        $this->dispatchBrowserEvent(
            'alert', ['type' => 'success',  'message' => 'Slide successfully deleted.']);
    }
}
