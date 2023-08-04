<x-layout title="Episódios">

    <form action="" class="w-100 d-flex flex-column align-items-center">
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

        <a href=" {{ route('series.create') }} " class="btn btn-popcorn btn-add">
            <span class="back-cinema">Adicionar</span>
        </a>

    </form>
    <script>
        const series = {{ Js::from($episodes) }};
        console.log(series);
    </script>
</x-layout>
