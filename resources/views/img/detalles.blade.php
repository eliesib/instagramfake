<x-app-layout>
    <x-slot name="header">
    

    </x-slot><br>

    <div>

        <div>
            @if (isset($status))
                <p class="status">{{ $status }}</p>
            @endif
        </div>


        <div class="flex-auto flex-col justify-center w-[800px] m-auto rounded-lg shadow-2xl bg-white">
            <div class="section-user">
                <div>
                    <img class="avatar" src="{{ url('perfil/avatar/' . $i->users->image) }} ">


                </div>
                <div>

                    <a class="user-name">
                        {{ $i->users->usuario }}
                    </a>
                </div>
            </div>
            <div class="image-container">
                <img src="{{ route('image.mostrar', ['filename' => $i->image_path]) }}">


            </div>

            <div class="likes">
                <img src="{{ asset('img/like.png') }}">
            </div>

            <div class="content">
                <div>
                    <a class="user-name"> {{ $i->users->usuario . ': ' }} </a>
                    {{ $i->description }}
                </div>
                <div class="fecha">
                    <a>{{ \FormatTime::LongTimeFilter($i->updated_at) }} </a>
                </div>
                <hr>
                @foreach ($i->comments as $comment)
                    <div>
                        <a class="user-name">
                            {{ $comment->users->usuario }}

                        </a>
                        {{ $comment->content }}


                        @if (Auth::user()->id == $comment->users->id)
                            <!-- Continuas por aqui, falta poder eliminar comentarios-->
                            <button
                                onclick="location.href = '{{ route('comment.delete', ['id' => $comment->id]) }}';"
                                id="delete"> Eliminar</button>
                        @endif


                    </div>


                    <div class="fecha">
                        <a>{{ \FormatTime::LongTimeFilter($comment->updated_at) }} </a>
                    </div>
                    <hr>
                @endforeach
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
