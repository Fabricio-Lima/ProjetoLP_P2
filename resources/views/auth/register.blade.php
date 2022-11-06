<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-jet-label for="name" value="{{ __('Nome') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('nome')" required autofocus autocomplete="nome" />
            </div>

            <div>
                <x-jet-label for="cpf" value="{{ __('CPF') }}" />
                <x-jet-input id="cpf" class="block mt-1 w-full" type="number_format" name="cpf" :value="old('cpf')" required autofocus autocomplete="cpf" />
            </div>

            <div>
                <x-jet-label for="rg" value="{{ __('RG') }}" />
                <x-jet-input id="rg" class="block mt-1 w-full" type="number_format" name="rg" :value="old('rg')" required autofocus autocomplete="rg" />
            </div>

            <div>
                <x-jet-label for="celular" value="{{ __('Celular') }}" />
                <x-jet-input id="celular" class="block mt-1 w-full" type="number_format" name="celular" :value="old('celular')" required autofocus autocomplete="celular" />
            </div>

            <div>
                <x-jet-label for="telefone" value="{{ __('Telefone') }}" />
                <x-jet-input id="telefone" class="block mt-1 w-full" type="number_format" name="telefone" :value="old('telefone')" required autofocus autocomplete="telefone" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout>
