<x-layout title="Temporadadas de {!! $series->name !!}">

    <div class="my-2 w-75">
        <ul class="list-group">
                @foreach ($seasons as $season)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="{{ route('episodes.index', $season->id) }}">Temporada {{ $season->number }}</a>

                        <span class="badge bg-secondary">
                            {{ $season->episodes->count() }}
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
