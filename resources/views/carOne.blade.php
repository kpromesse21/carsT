<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('detail du vehicule '.$car->matricule) }}
        </h2>
    </x-slot>
    <div class="panel">
         <div class="card mx-auto">
        <a href="{{route('vehicule.index')}}" class="float-right text-blue-700 border-b-[1px]">Retour</a><br>
        Matricule: {{$car->matricule}} <br>
        Categorie: {{$car->categorie}} <br>
        Date d'enregistrement: {{$car->created_at->format('d-m-Y')}}
        <h2>Payements</h2>
        @forelse ($car->payements as $item) 
        <hr>
        <?php $assurence=App\Models\Assurence::find($item->assurences_id)?>
        <span>Nom de l'assurence : {{$assurence->name}}</span><br>
        <span>Payer le {{$item->created_at->format('d-m-y')}}</span>
        @empty
        <h1 class="text-xl text-red-800 mx-auto bg-red-400 text-center rounded-b  ">| Aucun payement effectuer |</h1>
        @endforelse

        <h2>contravation</h2>
        @forelse ($contraventions as $item) 
        <hr>
        <?php $assurence=App\Models\Contraventions::find($item->id)?>
        <span>motif : {{$item->motif}}</span><br>
        <span>effectuer le: {{$item->created_at->format('d-m-y')}}</span><br>
        
        @empty
            <h1 class="text-xl text-red-800 mx-auto bg-red-400 text-center rounded-b">| Aucun payement effectuer |</h1>
        @endforelse
    </div>
    </div>
   
</x-app-layout>