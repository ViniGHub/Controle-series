<x-layout title="Adicionar Série" back='series.index'>

    <form id="form-series" class="w-75 h-100 d-flex flex-column" action=" {{ route('series.store') }} " method="POST">
        @csrf

        <div class="row mb-3">
            <div class="col-10">
                <label for="name" class="form-label text-white">Nome da Série</label>
                <input autofocus type="text" id="name" name="name" placeholder="Digite o nome da série aqui"
                    class="form-control" value="{{ old('name') }}">
            </div>

            <div class="col-2">
                <label for="season" class="form-label text-white">Temporadas</label>
                <input type="number" id="season" name="season" max="10" placeholder="N° Temp."
                    class="form-control" value="{{ old('season') }}">
            </div>

        </div>

        <section class="w-100 d-flex align-items-end flex-column mb-2 rounded ">
            <div id="tempEps" class="w-100 d-flex flex-column align-items-end mx-2">

            </div>

        </section>

        <button form="form-series" class="btn btn-dark w-8 align-self-end">Enviar</button>
    </form>



</x-layout>
