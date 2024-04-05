<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{-- {{ __('Controle du vehicule '.$car->matricule) }} --}}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="panel">
            <div class="card mx-auto">
                <h1>Edition d'une faute</h1>
                @isset($alert)
                    <div class="alert-success">{{ $alert }}</div>
                @endisset
                <form action="{{ route('faute.update') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id" value="{{$faute->id}}">
                    <label>
                       motif
                    </label>
                    <x-text-input class="block mt-1 w-full" type="text" value="{{$faute->motif}}" name="motif" placeholder="lorem ipsum dolor rem .."
                        required />
                    <label>
                       montant
                    </label>
                    <x-text-input class="block mt-1 w-full" type="number" value="{{$faute->montant}}" name="montant" placeholder=""
                        required />
                    <button type="submit" class="btn-save">Mettre à jour</button>
                </form>
            
            </div>
        </div>

    </div>
</x-app-layout>
