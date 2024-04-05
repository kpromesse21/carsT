<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('enregistrement de vehicule') }}
        </h2>
    </x-slot>

    <div class="">
        <div class=" ">
            <div class="panel grid md:grid-cols-6 gap-5">
                <div class="card col-span-3 ">
                    <div class="p-6 text-gray-900">
                        <h2 class="mx-auto text-white">Fomulaire d'ajout de vehicule</h2><br>
                        

                        <form action="{{ route('register.confirm') }}" method="post"class="mx-auto">
                            @csrf
                            <label for="matricule">matricule</label>
                            <x-text-input class="block mt-1 w-full" type="text" name="matricule" required />
                            <label for="num_carte_grise">Numero carte grise</label>
                            <x-text-input class="block mt-1 w-full" type="text" name="num_carte_grise" required />
                            <label for="num_carte_proprietaire">Numero de carte du proprietaire</label>
                            <x-text-input class="block mt-1 w-full" type="text" name="num_carte_proprietaire"
                                required />
                            <label for="num_carte_grise">mail du proprietaire</label>
                            {{-- @if ($alert)
                                <div class="alert-danger">
                                    <p>{{$alert}}</p>
                                </div>
                            @endif --}}
                            @isset($alert)
                                <div class="alert-danger">
                                    <p>{{ $alert }}</p>
                                </div>
                            @endisset
                            <x-text-input class="block mt-1 w-full" type="email" name="mail" required />
                            <label for="categorie">Categorie</label>
                            <select name="categorie" id="" class="input-text">
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                                <option value="E">E</option>
                            </select> <br>
                            <label for="mark">Mark du vehicule</label>
                            <x-text-input class="block mt-1 w-full" type="text" name="mark" required />
                            <br>
                            <button type="submit" class="btn-save">
                                {{ __('enregistrer') }}
                            </button>
                        </form>
                    </div>
                </div>
                <di class="card col-span-3 ">
                    <h2 class="text-center">Voitures enregistrées</h2>
                    <div class="table">
                        <table class="">
                            <thead>
                                <th>Matricule</th>
                                <th>Action</th>
                            </thead>
                            @foreach ($cars as $item)
                                <tr>
                                    <td>{{ $item->matricule }}</< /td>
                                    <td> <a href="{{ route('car.show', $item->id) }}" class=" text-blue-500">plus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>

                    {{-- 
                    <ul class="mx-auto">
                        <li class="flex gap-[20px]">
                            <h3>matricule</h3>
                            <h3>actions</h3>
                        </li>
                      
                            <li class="flex gap-[20px]">
                                <h3>{{ $item->matricule }}</h3>
                               
                            </li>
                       

                    </ul> --}}
                </di>
            </div>
        </div>
    </div>



</x-app-layout>
