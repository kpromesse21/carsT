<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('enregistrement de vehicule') }}
        </h2>
    </x-slot>

    <div class="container">
        <div class="py-12 ">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="card">
                    <div class="p-6 text-gray-900">
                        <h2 class="mx-auto">Fomulaire d'ajout de vehicule</h2><br>
        
                        <form action="{{ route('register.confirm') }}" method="post"class="mx-auto">
                            @csrf
                            <label for="matricule">matricule</label>
                            <x-text-input class="block mt-1 w-full" type="text" name="matricule" required />
                            <label for="num_carte_grise">Numero carte grise</label>
                            <x-text-input class="block mt-1 w-full" type="text" name="num_carte_grise" required />
                            <label for="num_carte_proprietaire">Numero de carte du proprietaire</label>
                            <x-text-input class="block mt-1 w-full" type="text" name="num_carte_proprietaire" required />
                            <label for="num_carte_grise">mail du proprietaire</label>
                            {{-- @if ($alert)
                                <div class="alert-danger">
                                    <p>{{$alert}}</p>
                                </div>
                            @endif --}}
                            @isset($alert)
                            <div class="alert-danger">
                                <p>{{$alert}}</p>
                            </div>
                            @endisset
                            <x-text-input class="block mt-1 w-full" type="email" name="mail" required />
                            <label for="categorie">Categorie</label>
                            <select name="categorie" id="" class="w-full rounded">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select>
                            <label for="mark">Mark du vehicule</label>
                            <x-text-input class="block mt-1 w-full" type="text" name="mark" required />
                            <br>
                            <button type="submit" class="btn-save">
                                {{ __('enregistrer') }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>
