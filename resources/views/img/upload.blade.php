<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subir foto') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('image.save') }}" enctype="multipart/form-data">
                        @csrf
                        <div>
                            <label for="image">Imagen: </label>
                            <x-input id="image" type="file" name="image" required autofocus />
                        </div>
                        <div>
                            <x-label for="description" :value="__('Descripción: ')" />

                            <textarea id="description" class="block mt-1 w-full" type="" name="description" autofocus></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">

                            <x-button class="ml-4">
                                {{ __('Subir') }}
                            </x-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
