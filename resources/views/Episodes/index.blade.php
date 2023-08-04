<x-layout title="Episódios da temporada {!! $season->number !!}">

    <form method="POST" class="w-100 d-flex flex-column align-items-center">
        @csrf
        <div class="my-2 w-75">
            <ul class="list-group">
                @foreach ($episodes as $episode)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Episódio: {{ $episode->number }}

                        <input 
                        type="checkbox" 
                        name="epCheck[]" 
                        id="epCheck" 
                        value="{{ $episode->id }}"
                        @if ($episode->watched)
                            checked
                        @endif
                        >
                    </li>
                @endforeach
            </ul>
        </div>

        <button class="btn btn-popcorn btn-add">
            <span class="back-cinema">Salvar</span>
        </button>

    </form>
    <script>
        const series = {{ Js::from($episodes) }};
        console.log(series);
    </script>
</x-layout>
