<x-app-layout>
    <x-slot name="header">

    </x-slot><br>

    <div>

        <div>
            @if (isset($status))
                <p class="status">{{ $status }}</p>
            @endif
        </div>


        @foreach ($images as $i)
            <div class="flex-container">

                <div class="section-user">
                    <div>
                        <a class="user-name" href="{{ route('perfil', ['usuario' => $i->users->usuario]) }}">
                            <img class="avatar" src="{{ url('perfil/avatar/' . $i->users->image) }} ">
                            {{ $i->users->usuario }}
                        </a>
                    </div>

                </div>

                <div class="image-container">
                    <img src="{{ route('image.mostrar', ['filename' => $i->image_path]) }}">
                </div>

                <div class="likes">

                    @if (count($i->likes) >= 1)
                        @foreach ($i->likes as $likes)
                            @if ($likes->user_id == Auth::user()->id)
                                <img src="{{ asset('img/like-clic.png') }}" data-id="{{ $likes->image_id }}"
                                    class="btn-dislike">
                            @elseif($loop->last)
                                <img src="{{ asset('img/like.png') }}" data-id="{{ $likes->image_id }}"
                                    class="btn-like">
                            @endif
                        @endforeach
                    @else
                        <img src="{{ asset('img/like.png') }}" data-id="{{ $i->id }}" class="btn-like">
                    @endif
                    <p class="black"> {{ count($i->likes) }} Me gustas</p>

                </div>
                <div class="content">
                    <div>
                        <a class="user-name"> {{ $i->users->usuario . ': ' }} </a>
                        {{ $i->description }}
                    </div>
                    <div>
                        <a class="see"
                            href="{{ route('img-detalles', ['user' => $i->users->name, 'id' => $i->id]) }}">
                            ver los
                            {{ count($i->comments) }} comentarios</a>
                    </div>
                    <div class="fecha">
                        <a>Hace {{ \FormatTime::LongTimeFilter($i->updated_at) }} </a>
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

            </div> <br>
        @endforeach

        <div class="pagination">
            <div class="clearfix"> </div>
            {{ $images->links() }}
        </div>


    </div>
</x-app-layout>
