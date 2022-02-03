<?php

namespace App\Http\Livewire;

use App\Models\BillingAddress;
use App\Models\CustomerPayment;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Storage;

class ProfilInfo extends Component
{

    public $user;
    public BillingAddress $billingAddress;
    public ShippingAddress $shippingAddress;
    public CustomerPayment $customerPayment;

    protected $rules = [
        'user.mobile_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|digits:15|unique:users',
    ];

    public function mount()
    {
        $this->user = Auth::user();
    }

    public function render()
    {
        return view('livewire.profil-info', [
            'user' => $this->user,
            'billingAddress' => $this->user->billingAddress(),
            'shippingAddress' => $this->user->shippingAddress(),
            'customerPayment' => $this->user->customerPayment(),
        ]);
    }

    public function updateBilling()
    {
        $this->user->billingAddress()->save($this->billingAddress);
    }

    public function updateShipping()
    {
        $this->user->shippingAddress()->save($this->shippingAddress);
    }

    public function exportUserData()
    {
        /* Store file in storage/app/public/exports, send a download as a response and then delete the file once sent */

        $filename = $this->user->first_name . $this->user->name . '.txt';

        $path = 'public/exports/' . $filename;

        Storage::put($path, $this->user->toArray());

        Storage::prepend($path, $this->user);

        foreach($this->user as $element)
        {
            
        }

        return response()->download(storage_path('app/' . $path))->deleteFileAfterSend(true);
    }
}
