<div class="livewire-div">
    @if (Cart::content()->count() == 0)
    <div class="nothing-msg-container">
        <span class="nothing-in-cart">Il n'y a encore rien dans votre panier...</span>
        <div>
            <a class="if-nothing-in-cart" href="{{route('products.index')}}">Continuer mes achats</a>
        </div>
    </div>
@else
    <div class="h1_container">
        <h1>Panier</h1>
    </div>
    <div class="item-checkout-container">
        <div class="items">
            @foreach ($products as $product)
                <div class="item">
                    <div class="product">
                        <a href="/products/product-detail/{{ $product->id }}" class="href-img"><img src="{{ Storage::url($productClass::findOrFail($product->id)->picture_path) }}" alt=""></a>
                        <a href="/products/product-detail/{{ $product->id }}" class="href-name"><span class="product-name">{{ stripslashes($product->name) }}</span></a>
                    </div>
                    <div class="container-number-delete-btn">
                        <div class="number">
                            <span class="quantity">Quantité :</span>
                            <input type="number" name=""
                            wire:model="qty.{{ $product->rowId }}"
                            wire:change="updateQty('{{ $product->rowId }}')"
                            value="{{ $qty[$product->rowId] }}"
                            class="quantity-input"
                            min="1">
                        </div>
                        <button wire:click="deleteItem('{{ $product->rowId }}')"><img src="{{ asset('images/cart/trash.svg') }}" alt=""></button>
                    </div>
                </div>
            @endforeach
            <div class="buy-more">
                <a href="{{route('products.index')}}">Continuer mes achats</a>
            </div>
        </div>
        <div class="checkout">
            <div class="content">
                <div class="checkout1">
                    @foreach ($products as $product)
                    <div class="container-name-price">
                        <span>{{ stripslashes($product->name) }}</span>
                        <span class="price">{{ $product->price }}€</span>
                        <span>Quantité : {{ $product->qty }}</span>
                    </div>
                    @endforeach
                </div>
                <div class="tva">TVA : 20%</div>
                <span class="line"></span>
                <div class="checkout2">
                    <span>Total TTC</span>
                    <span>{{ $total }}€</span>
                </div>
            </div>
            <a class="buy" href="#">Acheter</a>
            <div class="icons">
                <div>
                    <img src="{{asset('images/cart/livraison1.svg')}}" alt="">
                    <span>Livraison rapide</span>
                </div>
                <div>
                    <img src="{{asset('images/cart/payment2.svg')}}" alt="">
                    <span>Paiement sécurisé</span>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
