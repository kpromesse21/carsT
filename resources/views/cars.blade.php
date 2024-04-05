<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('vos poccessions') }}
        </h2>
    </x-slot>
    <div class="panel grid grid-cols-6">
         @forelse ($cars as $item)
        <div class="card col-span-2">
            <h2>matricule : {{$item->matricule}}</h2><hr>
            <strong>categorie : {{$item->categorie}}</strong><br>
            <strong>mark : {{$item->mark}}</strong><br>
            <a class="btn-show btn" href="{{route('vehicule.show',['vehicule'=>$item->id])}}">plus des details</a> 
        </div>
    @empty
       <div class="card"><h1>vous n'avez aucun vehicule</h1></div> 
    @endforelse 
    </div>
   
</x-app-layout>