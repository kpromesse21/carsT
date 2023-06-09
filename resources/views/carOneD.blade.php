<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('detail du vehicule '.$car->matricule) }}
        </h2>
    </x-slot>
    <div class="card">
        <a href="{{route('dashboard')}}" class="float-right text-blue-700 border-b-[1px]">Retour</a><br>
        Matricule: {{$car->matricule}} <br>
        Categorie: {{$car->categorie}} <br>
        Date d'enregistrement: {{$car->created_at->format('d-m-Y')}}
        @if (Auth::user()->statut=== 3)
        <div class="mt-2"> <a href="{{route('contravention.show',['contravention'=>$car->id])}}" class="btn-danger ">ajouter une contravention</a></div>    
        @endif
        
       
        <h2>Payements</h2>
        @forelse ($car->payements as $item) 
        <hr>
        <?php $assurence=App\Models\Assurence::find($item->assurences_id)?>
        <span>Nom de l'assurence : {{$assurence->name}}</span><br>
        <span>Payer le {{$item->created_at->format('d-m-y')}}</span><br>
        
        @empty
            <h1 class="text-xl text-red-800 mx-auto bg-red-400 text-center rounded-b">| Aucun payement effectuer |</h1>
        @endforelse
    </div>
</x-app-layout>