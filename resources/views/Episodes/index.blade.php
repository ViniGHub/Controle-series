<x-layout title="Episódios {!! $season !!}">

    <div class="my-2 w-75">
        <ul class="list-group">
            @foreach ($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio: {{ $episode->number }}

                    <input type="checkbox" name="epCheck[]" id="epCheck" value="{{ $episode->id }}">
                </li>
            @endforeach
        </ul>
    </div>

    <button></button>

    <script>
        const series = {{ Js::from($episodes) }};
        console.log(series);
    </script>
</x-layout>
