<x-jet-form-section submit="createTeam">
    <x-slot name="title">
        {{ __('Solicitar Pedido') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Preencha todos os campos!') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="produto" value="{{ __('Produto') }}" />
            <x-jet-select
                id="produto"
                type="text"
                class="mt-1 block w-full"
                wire:model.defer="state.name" autofocus
            >
                <option value=""> Paracetamol </option>
            </x-jet-select>
            <x-jet-input-error for="name" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-button>
            {{ __('Solicitar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
