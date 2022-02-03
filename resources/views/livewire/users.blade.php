<div class="px-5 mx-4">
    <div>
        <h2 class="text-center">Liste des utilisateurs</h2>
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
                    <option value="first_name">Prénom</option>
                    <option value="admin">Privillège</option>
                    <option value="created_at">Création</option>
                    <option value="updated_at">Mis à jour</option>
                    <option value="id">Id</option>
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
        <button class="btn btn-danger" wire:click="deleteUsers()">Supprimer {{ count($checked) }} utilisateurs</button>
        @endif
    </div>
    <div class="card-body table-responsive p-0">
        <table class="table table-hover">
            <tbody>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Privillège</th>
                    <th>Email</th>
                    <th>Date de création</th>
                    <th>Date de dernière mise à jour</th>
                </tr>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->first_name }}</td>
                        <td>
                            <select class="form-control" wire:model="admin" name="admin" id="admin">
                                @if ($user->admin !== 1)
                                    <option value="1">1</option>
                                @endif
                                @if ($user->admin !== 2)
                                    <option value="2">2</option>
                                @endif
                                @if ($user->admin !== 3)
                                    <option value="3">3</option>
                                @endif
                            </select>
                        </td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>{{ $user->updated_at }}</td>
                        <td><button class="btn btn-success btn-sm" onclick="confirm('Êtes-vous sûr de mettre à jour cet utilisateur ?') || event.stopImmediatePropagation()" wire:click="updateAdmin({{ $user->id }})">Mettre à jour</button></td>
                        <td>
                            <button class="btn btn-danger btn-sm"
                                onclick="confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?') || event.stopImmediatePropagation()"
                                wire:click="deleteSingleRecord({{ $user->id }})"><i class="fa fa-trash"
                                    aria-hidden="true"></i>Supprimer</button>
                        </td>
                        <td><input wire:model="checked" type="checkbox" value="{{ $user->id }}"></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if ($users->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between d-flex">
        {{-- Previous Page Button --}}
        <div>
            @if ($users->onFirstPage())
            @else
        <button wire:click="previousPage" wire:loading.attr="disabled" dusk="previousPage.before" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            {!! __('Précédent') !!}
        </button>
        @endif
        </div>

        {{-- Next Page Button --}}

        <div>
            @if ($users->hasMorePages())
            <button wire:click="nextPage" wire:loading.attr="disabled" dusk="nextPage.before" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('Suivant') !!}
            </button>
            @endif
        </div>
    </nav>
    @endif

</div>
