<div class="px-5 mx-4">
    <div>
        <h2 class="text-center">Liste des produits</h2>
        <div class="row mb-3 p-2">
            <div class="col-md-3">
                <label for="">Rechercher</label>
                <input type="text" class="form-control" wire:model.debounce.100ms="search" name="search">
            </div>
            <div class="col-md-2">
                <label for="">Par page</label>
                <select class="form-control" wire:model="perPage" name="perPage" id="perPage">
                    <option value="10">10</option>
                    <option value="20">20</option>
                    <option value="30">30</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="">Ordonné par</label>
                <select class="form-control" wire:model="orderBy">
                    <option value="name">Nom</option>
                    <option value="created_at">Création</option>
                    <option value="updated_at">Mis à jour</option>
                </select>
            </div>
            <div class="col-md-2">
                <label for="">Trier par</label>
                <select class="form-control" wire:model="sortBy">
                    <option value="asc">Croissant</option>
                    <option value="desc">Décroissant</option>
                </select>
            </div>
        </div>
    </div>

    <div>
        @if (count($checked) > 1)
        <button class="btn btn-danger" wire:click="deleteProducts()">Supprimer {{ count($checked) }} produits</button>
        @endif
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Titre</th>
                    <th>Stock</th>
                    <th>Date de création</th>
                    <th>Date de dernière mise à jour</th>
                </tr>
                @if ($products)
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->id }}</td>
                        <td>{{ stripslashes($product->name) }}</td>
                        <td>{{ stripslashes($product->title) }}</td>
                        <td><input type="text" name="stock" wire:model="stock" id="" class="form-control"></td>
                        <td>{{ $product->created_at }}</td>
                        <td>{{ $product->updated_at }}</td>
                        <td><a type="button" class="btn btn-success btn-sm" href="/product-edit/{{ $product->id }}">Editer</a></td>
                        <td>
                            <button class="btn btn-danger btn-sm"
                                onclick="confirm('Êtes-vous sûr de vouloir supprimer cet enregistrement ?') || event.stopImmediatePropagation()"
                                wire:click="deleteSingleRecord({{ $product->id }})"><i class="fa fa-trash"
                                    aria-hidden="true"></i>Supprimer</button>
                        </td>
                        <td><input wire:model="checked" type="checkbox" value="{{ $product->id }}"></td>
                    </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

    @if ($products)
    @if ($products->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between d-flex">
        {{-- Previous Page Link --}}
        <div>
            @if ($products->onFirstPage())
            @else
        <button wire:click="previousPage" wire:loading.attr="disabled" dusk="previousPage.before" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            {!! __('Précédent') !!}
        </button>
        @endif
        </div>

        {{-- Next Page Link --}}
        <div>
            @if ($products->hasMorePages())
            <button wire:click="nextPage" wire:loading.attr="disabled" dusk="nextPage.before" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('Suivant') !!}
            </button>
            @endif
        </div>
    </nav>
    @endif
    @endif
</div>
