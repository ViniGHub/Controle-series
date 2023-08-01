<x-layout title="Temporadadas de {!! $series->name !!}">

    <div class="my-2">
        <ul class="list-group">
            {{-- @if (is_numeric($id) && isset($series[$id]))
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('seasons.index', $id) }}">{{ $series[$id]->name }}</a>

                    <span class="d-flex">
                        <a class="btn btn-primary btn-sm mx-2" href=" {{ route('series.edit', $series[$id]) }} ">E</a>

                        <form action=" {{ route('series.destroy', $series[$id]) }} " method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">X</button>
                        </form>
                    </span>
                </li>
            @else --}}
                @foreach ($seasons as $season)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Temporada: {{ $season->number }}

                        <span class="badge bg-secondary">
                            {{ $season->episodes->count() }}
                        </span>
                    </li>
                @endforeach
            {{-- @endif --}}
        </ul>
    </div>

    <script>
        const series = {{ Js::from($seasons) }};
        console.log(series);
    </script>
</x-layout>
