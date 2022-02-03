<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartPage extends Component
{
    public array $check = [];
    public $qty = [];

    public function mount()
    {
        foreach(Cart::content() as $item)
        {
            $this->qty[$item->rowId] = $item->qty;
        }
    }

    public function render()
    {
        return view('livewire.cart-page', [
            'products' => Cart::content(),
            'total' => Cart::total(),
            'productClass' => Product::class,
        ]);
    }

    public function deleteItem($rowId)
    {
        Cart::remove($rowId);
        $this->emit('cart.updated');
    }

    public function updateQty($rowId)
    {
        Cart::get($rowId)->qty = $this->qty[$rowId];
    }
}
