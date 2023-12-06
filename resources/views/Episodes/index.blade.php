<x-layout title="Episódios {!! $season->number !!}" :mensagem="$mensagem" back="seasons.index" :backP="$serie->id">

    <form method="POST" class="w-100 d-flex flex-column align-items-center">
        @csrf
        <div class="my-2 w-75">
            <ul class="list-group">
                @foreach ($episodes as $episode)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Episódio {{ $episode->number }}

                        <div class="d-flex align-items-center justify-content-center">
                            <input type="checkbox" name="epCheck[]" id="epCheck{{ $episode->id }}"
                                value="{{ $episode->id }}" 
                                @if ($episode->watched) checked @endif>

                            <label class="d-flex align-items-center justify-content-center" for="epCheck{{ $episode->id }}">
                                <i class="fa-solid fa-check"></i>
                            </label>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>

        <button class="btn btn-effect btn-add">
            <span>Salvar</span>
        </button>

    </form>
    <script>
        const series = {{ Js::from($episodes) }};
        // console.log(series);
    </script>
</x-layout>
