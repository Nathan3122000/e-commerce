<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Product extends Component
{
    public $product;
    public $id_p;

    public function mount($product)
    {
        $this->id = 5;
        $this->product = $product;
    }

    public function render()
    {
        return view('livewire.product');
    }

    public function addToCart()
    {
        $this->id_p = 5;
        dd('as');
    }
}
