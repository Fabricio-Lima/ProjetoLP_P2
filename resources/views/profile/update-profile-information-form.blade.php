<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Informações do perfil') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Atualize as informações do perfil e o endereço de e-mail da sua conta.') }}
    </x-slot>

    <x-slot name="form">
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="nome" value="{{ __('Nome') }}" />
            <x-jet-input id="nome" type="text" class="mt-1 block w-full" wire:model.defer="state.nome" autocomplete="nome" />
            <x-jet-input-error for="nome" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="cpf" value="{{ __('CPF') }}" />
            <x-jet-input id="cpf" type="text" class="mt-1 block w-full" wire:model.defer="state.cpf" autocomplete="cpf" />
            <x-jet-input-error for="cpf" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="rg" value="{{ __('RG') }}" />
            <x-jet-input id="rg" type="text" class="mt-1 block w-full" wire:model.defer="state.rg" autocomplete="rg" />
            <x-jet-input-error for="rg" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="celular" value="{{ __('Celular') }}" />
            <x-jet-input id="celular" type="text" class="mt-1 block w-full" wire:model.defer="state.celular" autocomplete="celular" />
            <x-jet-input-error for="celular" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="telefone" value="{{ __('Telefone') }}" />
            <x-jet-input id="telefone" type="text" class="mt-1 block w-full" wire:model.defer="state.telefone" autocomplete="telefone" />
            <x-jet-input-error for="telefone" class="mt-2" />
        </div>
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Salvo.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Salvar') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
