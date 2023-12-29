@component('mail::message')

    # Serie {{ $nomeSerie }} criada .

    A série possui {{ $numTemps }} temporadas.

    Acesse aqui:

    @component('mail::button', ['url' => route('seasons.index', $idSerie)])
        Checar Série
    @endcomponent

@endcomponent


