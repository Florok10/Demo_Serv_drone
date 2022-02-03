<div>
    <div class="h1_container">
        <div class="blue_rectangle"></div>
        <h1>Profil de {{$user->name}} {{$user->first_name}}</h1>
    </div>
    <section>
        <table class="table">
            <tbody>
                <tr>
                    <th><label for="">Prénom :</label></th>
                    <td>{{ $user->first_name }}</td>
                </tr>
                <tr>
                    <th><label for="">Nom :</label></th>
                    <td>{{ $user->name }}</td>
                </tr>
                @if(!empty($user->mobile_phone) && !empty($user->home_phone))
                <tr>
                    <th>Tél mobile :</th>
                    <td>{{ 0 . $user->mobile_phone }}</td>
                </tr>
                <tr>
                    <th>Tél domicile :</th>
                    <td>{{ 0 . $user->home_phone }}</td>
                </tr>
            </tbody>
            @else
            <form method="POST" action="{{ route('updatePhones') }}" class="phone_form">
                @csrf
                <h2>Enregistrez vos numéros de téléphones</h2>
                <div>
                    <label for="">Téléphone mobile</label>
                    <input type="tel" name="mobile_phone" maxlength="10"
                    @if (!empty($user->mobile_phone))
                    value="{{$user->mobile_phone}}"
                    @endif>
                    @error('mobile_phone') <div class="error">{{ $message }}</div> @enderror
                </div>

                <div>
                    <label for="">Téléphone domicile</label>
                    <input type="tel" name="home_phone" maxlength="10"
                    @if (!empty($user->home_phone))
                    value="{{$user->home_phone}}"
                    @endif>
                    @error('home_phone') <div class="error">{{ $message }}</div> @enderror
                </div>

                <button type="submit" class="btn-submit">Envoyer</button>
            </form>
            @endif
        </table>
    </section>

    @if (!empty($usershippingAddress->postal_code))
    <section>
        <h2>Adresse de livraison</h2>
        <ul>
            <li>{{ $usershippingAddress->country }}</li>
            <li>{{ $usershippingAddress->address }}</li>
            <li>{{ $shippingAddress->postal_code }}</li>
            @if ( !empty($usershippingAddress->apartment_number) )
            <li>{{ $usershippingAddress->apartment_number }}</li>
            <li>{{ $usershippingAddress->building }}</li>
            @endif
        </ul>
    </section>
    @endif

    @if (!empty($billingAddress->postal_code))
    <section>
        <h2>Adresse de livraison</h2>
        <ul>
            <li>{{ $billingAddress->country }}</li>
            <li>{{ $billingAddress->address }}</li>
            <li>{{ $billingAddress->postal_code }}</li>
            @if (!empty($billingAddress->apartment_number))
            <li>{{ $billingAddress->apartment_number }}</li>
            <li>{{ $billingAddress->building }}</li>
            @endif
        </ul>
    </section>
    @endif

    <section>
        <x-jet-button class="ml-4" wire:click="exportUserData()">
            {{ __('Télécharger les données vous concernant') }}
        </x-jet-button>
    </section>

    {{-- @if (!empty($customerPayment->))

    <section>

    </section> --}}
</div>
