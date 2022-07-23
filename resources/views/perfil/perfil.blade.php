<x-app-layout>
    <x-slot name="header">
        <div class="container ">


        </div>
    </x-slot>

    <div class="py-12">
        <div class=" max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-xl-5 ">

                    {{ $user->usuario }}
                    <img src="{{ url('perfil/avatar/' . $user->image) }} " class="avatar-perfil">
                    @if (Auth::user()->id == $user->id)
                        <x-button class="ml-4">
                            <a href="{{ route('configuracion') }}">Configuracion</a>
                        </x-button>
                    @else
                        <x-button class="ml-4">
                            <a>Seguir</a>
                        </x-button>
                    @endif
                    <br>


                    <a>{{ count($user->images) }} publicaciones</a>

                    <p class="black"> {{ $user->name . ' ' . $user->surname }}</p>
                    <p>descripcion</p>

                    <p> seccion de estados </p>

                    <p> Submenu </p>
                    <div class=" space-x-8 sm:ml-10 sm:flex">
                        <x-nav-link >
                            Publicaciones
                        </x-nav-link>
                        <x-nav-link >
                            Guardados
                        </x-nav-link>
                        <x-nav-link >
                            Etiquetadas
                        </x-nav-link>
                    </div>


                </div>
                <div class="py-12 ">
                    @foreach ($user->images as $images)
                        <div class="perfil-imagenes">
                            <img src="{{ route('image.mostrar', ['filename' => $images->image_path]) }}">
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
