<x-app-layout>
    <x-slot name="header">


    </x-slot><br>

    <div>

        <div>
            @if (isset($status))
                <p class="status">{{ $status }}</p>
            @endif
        </div>


        <div class="flex flex-row w-[900px] h-auto m-auto shadow-2xl bg-white">
            <!-- Imagen ampliada -->
            <div class="w-1/2">
                <img class="aspect-square h-auto" src="{{ route('image.mostrar', ['filename' => $i->image_path]) }}">
            </div>

            <div class="flex flex-col w-1/2 pl-6">
                <!-- Perfil del usuario de la imagen -->
                <div class="pb-2.5">

                    <img class="avatar" src="{{ url('perfil/avatar/' . $i->users->image) }} ">

                    <a class="user-name">
                        {{ $i->users->usuario }}
                    </a>

                </div>
                <!-- Descripcion de la imagen -->
                <div class="pb-3">

                    <img class="avatar" src="{{ url('perfil/avatar/' . $i->users->image) }} ">
                    <p>
                        <a class="user-name"> {{ $i->users->usuario }} </a>
                        {{ $i->description }}
                    </p>
                    <p class="text-gray-600 text-xs">
                        {{ \FormatTime::LongTimeFilter($i->updated_at) }}
                    </p>
                </div>
                <!-- caja de comentarios-->


                @foreach ($i->comments as $comment)
                    <div class="flex flex-row">
                        <div class="pr-2">
                            <img class="avatar" src="{{ url('perfil/avatar/' . $comment->users->image) }} ">
                        </div>
                        <div class="w-4/6">
                            <p>
                                <a class="user-name"> {{ $comment->users->name }} </a>
                                {{ $comment->content }}
                            </p>
                            <p class="text-gray-600 text-xs pb-3">
                                {{ \FormatTime::LongTimeFilter($comment->updated_at) }}
                            </p>
                        </div>
                        <div class="w-2/6 pr-2">
                            @if (Auth::user()->id == $comment->users->id)
                                <!-- Continuas por aqui, falta poder eliminar comentarios-->
                                <button
                                    onclick="location.href = '{{ route('comment.delete', ['id' => $comment->id]) }}';"
                                    id="delete"> Eliminar</button>
                            @endif
                        </div>
                        <hr>
                      
                    </div>
                    @break($loop->iteration >= 5)
                @endforeach


                <div class="likes">

                    @if (count($i->likes) >= 1)
                        @foreach ($i->likes as $likes)
                            @if ($likes->user_id == Auth::user()->id)
                                <img src="{{ asset('img/like-clic.png') }}" data-id="{{ $likes->image_id }}" data-likes="{{ count($i->likes)-1 }}"
                                    class="btn-dislike">
                            @elseif($loop->last)
                                <img src="{{ asset('img/like.png') }}" data-id="{{ $likes->image_id }}" data-likes="{{ count($i->likes)+1 }}"
                                    class="btn-like">
                            @endif
                        @endforeach
                    @else
                        <img src="{{ asset('img/like.png') }}" data-id="{{ $i->id }}" data-likes="{{ count($i->likes)+1 }}" class="btn-like">
                    @endif
                    <p id="numlikes" class="black"> {{ count($i->likes) }} Me gustas</p>

                </div>
                <div>

                    <form action="{{ route('comment.save') }}" method="get">
                        <input type="hidden" name="image_id" value="{{ $i->id }}" />
                        <x-input id="addcomment" class="" type="text" name="comentario"
                            placeholder="Añade un comentario" />

                        <button class="comments">Publicar</button>
                    </form>
                </div>


            </div>
        </div>




    </div>
</x-app-layout>
