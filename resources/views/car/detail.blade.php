<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('detail du vehicule '.$car->matricule) }}
        </h2>
    </x-slot>
    <div class="card">
        <a href="{{route('vehicule.index')}}" class="float-right text-blue-700 border-b-[1px]">Retour</a><br>
        Matricule: {{$car->matricule}} <br>
        num de la carte du proprietaire:{{$car->num_carte_propietaire}} <br>
        numero de la carte grise : {{$car->num_carte_grise}} <br>
        Categorie: {{$car->categorie}} <br>
        Date d'enregistrement: {{$car->created_at->format('d-m-Y')}} <br>
        mark:{{$car->mark}} <br>
        <a href="{{route('car.edit',$car->id)}}" class="btn">editer</a>
        @forelse ($car->payements as $item) 
        <hr>
        <?php $assurence=App\Models\Assurence::find($item->assurences_id)?>
        <span>Nom de l'assurence : {{$assurence->name}}</span><br>
        <span>Payer le {{$item->created_at->format('d-m-y')}}</span>
        @empty
        <h1 class="text-xl text-red-800 mx-auto bg-red-400 text-center rounded-b  ">| Aucun payement effectuer |</h1>
        @endforelse
    </div>
</x-app-layout>