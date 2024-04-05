<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Controle du vehicule '.$car->matricule) }}
        </h2> --}}

    </x-slot>
    {{-- <div class="py-12"> --}}
        <div class="panel">
            <div class="card mx-auto">
            @isset($alert)
            <div class="alert-danger">
                <p>{{$alert}}</p>
            </div>
            @endisset
            <form action="{{ route('contravation.store') }}" method="POST">
                @csrf
                <label>
                    numero de plaque
                </label>
                <x-text-input class="block mt-1 w-full" type="text" name="plaque_num" placeholder="AA-XXXXXXXXX"
                    required />
                {{-- <x-text-input class="block mt-1 w-full" type="number" name="mail" placeholder="ex: 6/10" required /> --}}
                <label for="">Motif de la contravention</label>
                <select name="motif" id="" class="input-text">
                    <option value="0">mauvais parking</option>
                    <option value="1">mauvaise conduite</option>
                    <option value="2">griller un feu rouge</option>
                    <option value="3">pas d'assurence</option>
                    <option value="4">causer un accident</option>
                    <option value="5">manque de document</option>
                    <option value="6">retard de payement des contraventions</option>
                </select>
                <button type="submit" class="btn-save">enregistrer</button> <a href="/"
                    class="btn-danger">dashboard</a>
            </form>
        </div>
        </div>
        
    {{-- </div> --}}
</x-app-layout>
