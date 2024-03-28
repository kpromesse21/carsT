<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('vos poccessions') }}
        </h2>
    </x-slot>
    @forelse ($cars as $item)
        <div class="card">
            <h2>matricule : {{$item->matricule}}</h2><hr>
            <strong>categorie : {{$item->categorie}}</strong><br>
            <strong>categorie : {{$item->mark}}</strong><br>
            <a class="btn-more" href="{{route('vehicule.show',['vehicule'=>$item->id])}}">plus des details</a> 
        </div>
    @empty
       <div class="card"><h1>vous n'avez aucun vehicule</h1></div> 
    @endforelse 
</x-app-layout>