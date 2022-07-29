<x-app-layout>
    <x-slot name="header">
        <div class="container ">


        </div>
    </x-slot>

    <div class="py-12">
        <div class="flex-auto flex-col w-[935px] m-auto ">
            <div class="flex flex-row pb-10 h-[230px] ">
                <div class="w-1/3">
                    <img class="avatar-perfil" src="{{ url('perfil/avatar/' . $user->image) }}">
                </div>
                <div class="w-2/3 grid grid-rows-3 grid-flow-col ml-4 ">
                    <div class="h-auto">
                        <p class="text-2xl"> {{ $user->usuario }}
                            @if (Auth::user()->id == $user->id)
                                <x-button class="ml-4 ">
                                    <a href="{{ route('configuracion') }}">Editar perfil</a>
                                </x-button>
                            @else
                                <x-button class="ml-4">
                                    <a>Seguir</a>
                                </x-button>
                            @endif
                        </p>
                    </div>
                   
                    <div class="h-96">
                        <a>{{ count($user->images) }} publicaciones</a>
                    </div>
                    <div class="h-auto">
                        <p class="font-bold">{{$user->name . ' ' . $user->surname }}</p>
                        <p>{{$user->description}}</p>
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
                <div class="grid grid-cols-3 gap-x-4 gap-y-8">
                    @foreach ($user->images as $images)
                        <div class="w-[293px] h-[293px]">

                            <img class="object-cover h-full w-full" src="{{ route('image.mostrar', ['filename' => $images->image_path]) }}">
                        </div>
                    @endforeach



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
