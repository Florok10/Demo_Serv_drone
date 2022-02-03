<div>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    @if ($orders->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-between d-flex">
        {{-- Previous Page Link --}}
        <div>
            @if ($orders->onFirstPage())
            {{-- <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                {!! __('pagination.previous') !!}
            </span> --}}
        @else
        <button wire:click="previousPage" wire:loading.attr="disabled" dusk="previousPage.before" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
            {!! __('Précédent') !!}
        </button>
        @endif
        </div>

        <div>
            @if ($orders->hasMorePages())
            <button wire:click="nextPage" wire:loading.attr="disabled" dusk="nextPage.before" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:shadow-outline-blue focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                {!! __('Suivant') !!}
            </button>
            @endif
        </div>{{-- Next Page Link --}}
    </nav>
    @endif
</div>
