<x-layout title="Editar {!! $serie->name !!}" back='series.index'>
    <x-series.form :action="route('series.update', $serie->id)" :name="$serie->name" :color="$serie->color" :update="true"/>
</x-layout>