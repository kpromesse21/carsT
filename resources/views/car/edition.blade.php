<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('detail du vehicule ' . $car->matricule) }}
        </h2>
    </x-slot>
    <div class="panel grid md:grid-cols-6">
        <div class="card col-span-3">
            <a href="{{ route('vehicule.index') }}" class="float-right text-blue-700 border-b-[1px]">Retour</a><br>
            @isset($alert)
                <div class="alert-success">
                    <p>{{ $alert }}</p>
                </div>
            @endisset
            Matricule: {{ $car->matricule }} <br>
            Categorie: {{ $car->categorie }} <br>
            Date d'enregistrement: {{ $car->created_at->format('d-m-Y') }}
            <h2>Payements</h2>
            @forelse ($car->payements as $item)
                <hr>
                <?php $assurence = App\Models\Assurence::find($item->assurences_id); ?>
                <span>Nom de l'assurence : {{ $assurence->name }}</span><br>
                <span>Payer le {{ $item->created_at->format('d-m-y') }}</span>
            @empty
                <h1 class="text-xl text-red-800 mx-auto bg-red-400 text-center rounded-b  ">| Aucun payement effectuer |
                </h1>
            @endforelse
            <form action="{{ route('car.update') }}" method="post"class="mx-auto">
                @csrf
                <input type="hidden" name="car" value="{{ $car->id }}">
                <label for="matricule">matricule</label>
                <x-text-input class="block mt-1 w-full" type="text" name="matricule" value="{{ $car->matricule }}"
                    required />
                <label for="num_carte_grise">Numero carte grise</label>
                <x-text-input class="block mt-1 w-full" type="text" name="num_carte_grise"
                    value="{{ $car->num_carte_grise }}" required />
                <label for="num_carte_proprietaire">Numero de carte du proprietaire</label>
                <x-text-input class="block mt-1 w-full" type="text" name="num_carte_proprietaire"
                    value="{{ $car->num_carte_propietaire }}" required />
                {{-- <label for="num_carte_grise">mail du proprietaire</label>
            {{-- @if ($alert)
                <div class="alert-danger">
                    <p>{{$alert}}</p>
                </div>
            @endif --}}
                {{--
            <x-text-input class="block mt-1  w-full" type="email" name="mail" required /> --}}

                <label for="categorie">Categorie</label>
                <select name="categorie" default="C" value="{{ $car->categorie }}" id=""
                    class="w-full rounded">
                    <option {{ $car->categorie == 'A' ? 'selected' : '' }} value="A">A</option>
                    <option {{ $car->categorie == 'B' ? 'selected' : '' }} value="B">B</option>
                    <option {{ $car->categorie == 'C' ? 'selected' : '' }} value="C">C</option>
                    <option {{ $car->categorie == 'D' ? 'selected' : '' }} value="D">D</option>
                    <option {{ $car->categorie == 'E' ? 'selected' : '' }} value="E">E</option>
                </select>
                <label for="mark">Mark du vehicule</label>
                <x-text-input class="block mt-1 w-full" type="text" value="{{ $car->mark }}" name="mark"
                    required />
                <br>
                <button type="submit" class="btn-save">
                    {{ __('Mettre à jour') }}
                </button>
            </form>
        </div>
        <div class="card col-span-3">
            <h2>Ajout du proprietaire</h2>
            <form action="{{ route('car.recherche') }}" method="post" class="search-form">
                @csrf
                <input name="search" /><input type="hidden" name="id" value="{{ $car->id }}">

                <button type="submit">🔎</button>
            </form>
            @isset($user)
                <table class="table">
                    <thead>
                        <th>noms</th>
                        <th>addresse email</th>
                        <th>action</th>
                    </thead>
                    @foreach ($user as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>
                                <form action="{{ route('car.proprio') }}" method="post">
                                    @csrf <input type="hidden" name="user" value="{{ $item->id }}"> <input
                                        type="hidden" name="car" value="{{ $car->id }}"> <input type="submit"
                                        value="affecter">
                                </form>
                            </td>
                        </tr>
                    @endforeach

                </table>
            @endisset
           
            @if (!isset($user))
                <p>faites une recherche pour selectionner le proprietaire parmis les utilisateurs</p>
            @endif
        </div>
    </div>

</x-app-layout>
