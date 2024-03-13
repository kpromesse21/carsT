<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('detail du vehicule '.$car->matricule) }}
        </h2>
    </x-slot>
    <div class="card">
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
        @endforelse          <form action="{{ route('car.update') }}" method="post"class="mx-auto">
            @csrf
            <label for="matricule">matricule</label>
            <x-text-input class="block mt-1 w-full" type="text" name="matricule" value="{{$car->matricule}}" required />
            <label for="num_carte_grise">Numero carte grise</label>
            <x-text-input class="block mt-1 w-full" type="text" name="num_carte_grise" value="{{$car->num_carte_grise}}" required />
            <label for="num_carte_proprietaire">Numero de carte du proprietaire</label>
            <x-text-input class="block mt-1 w-full" type="text" name="num_carte_proprietaire" value="{{$car->num_carte_propietaire}}" required />
            <label for="num_carte_grise">mail du proprietaire</label>
            {{-- @if ($alert)
                <div class="alert-danger">
                    <p>{{$alert}}</p>
                </div>
            @endif --}}
            @isset($alert)
            <div class="alert-danger ">
                <p>{{$alert}}</p>
            </div>
            @endisset
            <x-text-input class="block mt-1  w-full" type="email" name="mail" required />
            <label for="categorie">Categorie</label>
            <select name="categorie" value="{{$car->categorie}}" id="" class="w-full rounded">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
            </select>
            <label for="mark">Mark du vehicule</label>
            <x-text-input class="block mt-1 w-full" type="text"  value="{{$car->mark}}" name="mark" required />
            <br>
            <button type="submit" class="btn-save">
                {{ __('enregistrer') }}
            </button>
        </form>
    </div>
</x-app-layout>