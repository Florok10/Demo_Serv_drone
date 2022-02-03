<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $checked = [];
    public array $quantity = [];

    public $byName = null;
    public $perPage = 10;
    public $orderBy = 'name';
    public $sortBy = 'asc';
    public $search = "";

    public function mount()
    {
        //
    }

    public function render()
    {
        $search = '%' . $this->search . '%';

        return view('livewire.products', [
            'search' => $this->search,
            'checked' => $this->checked,
            'products' => Product::where('name', 'like', $search)
                                ->orWhere('title', 'like', $search)
                                ->orWhere('id', 'like', $search)
                                ->paginate($this->perPage)
        ]);
    }

    public function deleteSingleRecord($id)
    {
        Product::findOrFail($id)->delete();
        session()->flash('info', 'Produit supprimé avec succès');

    }

    public function deleteProducts()
    {
        Product::whereKey($this->checkedProducts)->delete();
        $this->checkedProducts = [];
        session()->flash('info', 'Produits sélectionnés supprimés avec succès');
    }

}
