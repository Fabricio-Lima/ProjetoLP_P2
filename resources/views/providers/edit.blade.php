<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar Fornecedor
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('providers.update', $provider->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nome" class="block font-medium text-sm text-gray-700">Nome</label>
                            <input type="text" name="nome" id="nome" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('nome', $provider->nome) }}" />
                            @error('nome')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="cnpj" class="block font-medium text-sm text-gray-700">CNPJ</label>
                            <input type="text" name="cnpj" id="cnpj" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('cnpj', $provider->cnpj) }}" />
                            @error('cnpj')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="celular" class="block font-medium text-sm text-gray-700">Celular</label>
                            <input type="text" name="celular" id="celular" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('celular', $provider->celular) }}" />
                            @error('celular')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex justify-between flex-row bg-white">
                            <div class="flex items-center justify-end px-4 py-3 bg-white-50 text-right sm:px-6">
                                <button lass="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    <a href="{{ route('providers.index') }}">Voltar</a>
                                </button>
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-white-50 text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Editar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
