@include('layouts.navigation')

<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <p>Editar perfil </p>
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        @if (isset($status))

            <p class="status">{{$status}}</p>
            
        @endif

        <form method="POST" action="{{ route('update') }}" enctype="multipart/form-data">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Nombre')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="auth::User()->name" required autofocus />
            </div>

            <!-- Surname -->
            <div>
                <x-label for="surname" :value="__('Apellido')" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="auth::User()->surname" autofocus />
            </div>

             <!-- User -->
             <div>
                <x-label for="usuario" :value="__('Usuario')" />

                <x-input id="usuario" class="block mt-1 w-full" type="text" name="usuario" :value="auth::User()->usuario" required autofocus />
            </div>
            <!-- Descripcion -->
            <div>
                <x-label for="description" :value="__('Descripción')" />

                <x-input id="description" class="block mt-1 w-full" type="text" name="description" :value="auth::User()->description" required autofocus />
            </div>

            <div>
                <x-label :value="__('Imagen de perfil: ')" />

                <x-input id="image_path" class="block mt-1 w-full" type="file" name="image_path" />
            </div>

            <div class="flex items-center justify-end mt-4">

                <x-button class="ml-4">
                    {{ __('Guardar') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
