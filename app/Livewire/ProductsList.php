<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\Attributes\Session;


class ProductsList extends Component
{
    public $cart = [];

    public function mount()
    {
        $this->cart = session()->get('cart', []);
    }

    public function increment($id)
    {
        $this->cart[$id] = ($this->cart[$id] ?? 0) + 1;
        session()->put('cart', $this->cart);
        $this->dispatch('cart:refresh');
    }

    public function decrement($id)
    {
        if (isset($this->cart[$id]) && $this->cart[$id] > 0) {
            $this->cart[$id]--;
            session()->put('cart', $this->cart);
            $this->dispatch('cart:refresh');
        }
    }

    #[On('productList:increment')]
    public function incrementFromCart($id)
    {
        $this->increment($id);
    }

    #[On('productList:decrement')]
    public function decrementFromCart($id)
    {
        $this->decrement($id);
    }

    public function render()
    {
        $products = Product::get();
        return view('livewire.products-list', compact('products'));
    }
}
