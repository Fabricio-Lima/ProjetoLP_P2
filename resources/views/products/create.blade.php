<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Adicionar Produto
        </h2>
    </x-slot>

    <div>
        <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form method="post" action="{{ route('products.store') }}">
                    @csrf
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nome" class="block font-medium text-sm text-gray-700">Nome</label>
                            <input type="text" name="nome" id="nome" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('nome', '') }}" />
                            @error('nome')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="px-4 py-5 bg-white sm:p-6">
                            <label for="nome" class="block font-medium text-sm text-gray-700">Preço</label>
                            <input type="text" name="preco" id="preco" type="text" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                   value="{{ old('preco', '') }}" />
                            @error('preco')
                                <p class="text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="flex flex-row bg-white">
                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label class="block font-medium text-sm text-gray-700">Categoria</label>
                                <select name="categoria_id" class="form-control" value="{{ old('categoria_id', '') }}">
                                    <option> </option>
                                @foreach ($categories as $category)
                                    <option value="1">{{ $category->nome }}</option>
                                @endforeach
                                </select>
                                @error('categoria')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="px-4 py-5 bg-white sm:p-6">
                                <label class="block font-medium text-sm text-gray-700">Fornecedor</label>
                                <select name="fornecedor_id" class="form-control" value="{{ old('fornecedor_id', '') }}">
                                    <option> </option>
                                @foreach ($providers as $provider)
                                    <option value="1">{{ $provider->nome }}</option>
                                @endforeach
                                </select>
                                @error('fornecedor')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="flex justify-between flex-row bg-white">
                            <div class="flex items-center justify-end px-4 py-3 bg-white text-right sm:px-6">
                                <button lass="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    <a href="{{ route('products.index') }}">Voltar</a>
                                </button>
                            </div>
                            <div class="flex items-center justify-end px-4 py-3 bg-white text-right sm:px-6">
                                <button class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                    Adicionar
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
