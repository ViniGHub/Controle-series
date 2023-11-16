<x-layout title="Temporadadas {!! $series->name !!}" back='series.index'>

    <div class="my-2 w-75">
        <ul class="list-group">
                @foreach ($seasons as $season)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('episodes.index', $season->id) }}">Temporada {{ $season->number }}</a>

                        <span 
                        class="badge 
                        @if ($season->numberWatchedEpisodes()/$season->episodes->count() != 1) bg-secondary @else bg-primary @endif">
                            {{ $season->numberWatchedEpisodes() }} / {{ $season->episodes->count() }} 
                        </span>
                    </li>
                @endforeach
        </ul>
    </div>

    <script>
        const series = {{ Js::from($seasons) }};
        console.log(series);
    </script>
</x-layout>
