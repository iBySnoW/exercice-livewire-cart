<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use Livewire\Attributes\On;
use Livewire\Attributes\Session;

class Cart extends Component
{
    public $cart = [];
    public $products = [];
    public $total = 0;

    public function mount()
    {
        $this->refreshCart();
    }

    public function increment($id)
    {
        $this->cart[$id] = ($this->cart[$id] ?? 0) + 1;
        session()->put('cart', $this->cart);
        $this->dispatch('productList:increment', $id);
        $this->refreshCart();
    }

    public function decrement($id)
    {
        if (isset($this->cart[$id]) && $this->cart[$id] > 0) {
            $this->cart[$id]--;
            if ($this->cart[$id] == 0) {
                unset($this->cart[$id]);
            }
            session()->put('cart', $this->cart);
            $this->dispatch('productList:decrement', $id);
            $this->refreshCart();
        }
    }

    #[On('cart:refresh')]
    public function refreshCart()
    {
        $this->cart = array_filter(session()->get('cart', []), function($quantity) {
            return $quantity > 0;
        });
        $this->products = Product::whereIn('id', array_keys($this->cart))->get();
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = 0;
        foreach ($this->products as $product) {
            $this->total += $product->price * ($this->cart[$product->id] ?? 0);
        }
    }

    public function render()
    {
        return view('livewire.cart', [
            'cart' => $this->cart,
            'products' => $this->products,
            'total' => $this->total,
        ]);
    }
}
