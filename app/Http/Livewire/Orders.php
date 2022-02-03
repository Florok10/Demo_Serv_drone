<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Order;

class Orders extends Component
{

    public
    $name,
    $first_name,
    $country,
    $address,
    $postal_code,
    $apartment_number,
    $building,
    $status,
    $total_price,
    $done_at,
    $orders;

    public $perPage = 10;
    public $orderBy = '';
    public $sortBy = 'ASC';
    public $search = "";
    public $checked = [];

    public function mount()
    {
        // $this->orders = Order::all();
    }

    public function render()
    {

        $search = '%' . $this->search . '%';

        return view('livewire.orders', [
            'search' => $this->search,
            'checked' => $this->checked,
            'orders' => Order::orderBy($this->orderBy, $this->sortBy)->get()
                            ->where('id', 'like', $search)
                            ->orWhere('name', 'like', $search)
                            ->orWhere('first_name', 'like', $search)
                            ->orWhere('country', 'like', $search)
                            ->orWhere('address', 'like', $search)
                            ->orWhere('postal_code', 'like', $search)
                            ->orWhere('status', 'like', $search)
                            ->orWhere('done_at', 'like', $search)
                            ->paginate($this->perPage)
        ]);
    }
}
