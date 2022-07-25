<x-app-layout>
    <x-slot name="header">
        <div class="container ">


        </div>
    </x-slot>

    <div class="py-12">
        <div class="flex-auto flex-col w-2/3 m-auto bg-white">
            <div class="flex flex-row justify-items-center pb-10">
                <div class="w-1/4">
                    <img class="avatar-perfil" src="{{ url('perfil/avatar/' . $user->image) }}">
                </div>
                <div class="w-3/4 grid grid-rows-4 grid-flow-col">
                    <div class="">
                        <p class="text-2xl"> {{ $user->usuario }}
                            @if (Auth::user()->id == $user->id)
                                <x-button class="ml-4">
                                    <a href="{{ route('configuracion') }}">Editar perfil</a>
                                </x-button>
                            @else
                                <x-button class="ml-4">
                                    <a>Seguir</a>
                                </x-button>
                            @endif
                        </p>
                    </div>
                    <div>
                        <a>{{ count($user->images) }} publicaciones</a>
                    </div>
                    <div>
                        <p class="black"> {{ $user->name . ' ' . $user->surname }}</p>
                    </div>
                    <div>
                        <p>descripcion</p>
                    </div>
                </div>
            </div>
            <div class=" overflow-hidden shadow-sm sm:rounded-lg">
                <div class="py-xl-5 ">


                    <div class=" space-x-8 sm:ml-10 sm:flex justify-center">
                        <x-nav-link>
                            Publicaciones
                        </x-nav-link>
                        <x-nav-link>
                            Guardados
                        </x-nav-link>
                        <x-nav-link>
                            Etiquetadas
                        </x-nav-link>
                    </div>


                </div>
                <div class="grid grid-cols-3 gap-4">
                    @foreach ($user->images as $images)
                        
                            <img src="{{ route('image.mostrar', ['filename' => $images->image_path]) }}">
                        
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
