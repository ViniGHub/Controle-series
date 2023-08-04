<<<<<<< HEAD
<x-layout title="Episódios de série">
    <h1>Ola mundo</h1>
</x-layout>
=======
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
>>>>>>> 1f2e0b4fd74d24fe0a0603285603cf85fbac6f94
