<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use App\Models\BillingAddress;
use App\Models\ShippingAddress;
use App\Models\OrderHistory;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:255', "regex:^\s*[a-zA-Zéèàê']+\s*$^"],
            'first_name' => ['required', 'string', 'max:255', "regex:^\s*[a-zA-Zéèàê']+\s*$^"],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();

        /* Création des relations obligatoires à la création de l'user, pour l'instant vide mais modifiable par l'user plus tard */

        $shipping_address = new ShippingAddress();

        $billing_address = new BillingAddress();

        $orderHistory = new OrderHistory();

        $user = new User([
            'name' => addslashes($input['name']),
            'first_name' => addslashes($input['first_name']),
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
            'rgpd' => true,
        ]);
        /* Ici les fonctions laravel pour créer ces relations en DB */
        $user->save();
        $user->shippingAddress()->save($shipping_address);
        $user->billingAddress()->save($billing_address);
        $user->orderHistory()->save($orderHistory);

        return $user;

    }
}
