<x-jet-form-section submit="updateProfileInformation">

    <x-slot name="title">
        {{ __('Informations') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Mettez à jour votre adresse email') }}
    </x-slot>

    <x-slot name="form">

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Enregistré') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Enregistrer') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
