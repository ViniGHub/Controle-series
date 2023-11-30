<x-layout title="Séries" :mensagem="$mensagem">

    <div class="my-2 w-100 d-flex align-items-center justify-content-center">
        <ul class="list-group w-75">
            @if (is_numeric($id) && isset($series[$id]))
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    <a href="{{ route('seasons.index', $series[$id]->id) }}">{{ $series[$id]->name }}</a>

                    <span class="d-flex">
                        <a class="btn btn-primary btn-sm mx-2" href=" {{ route('series.edit', $series[$id]->id) }} ">E</a>

                        <form action=" {{ route('series.destroy', $series[$id]->id) }} " method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm">X</button>
                        </form>
                    </span>
                </li>
            @else
                @foreach ($series as $serie)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a style="color: {{ $serie->color }};" href="{{ route('seasons.index', $serie->id) }}">{{ $serie->name }}</a>

                        <span class="d-flex">
                            <a class="btn btn-primary btn-sm mx-2" href=" {{ route('series.edit', $serie->id) }} ">E</a>

                            <form action=" {{ route('series.destroy', $serie->id) }} " method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm">X</button>
                            </form>
                        </span>
                    </li>
                @endforeach
            @endif
        </ul>
    </div>
    <a href=" {{ route('series.create') }} " class="btn btn-effect btn-add">
        <span>A</span><span>d</span><span>i</span><span>c</span><span>i</span><span>o</span><span>n</span><span>a</span><span>r</span>
    </a>

    <script>
        const series = {{ Js::from($series) }};
    </script>
</x-layout>
