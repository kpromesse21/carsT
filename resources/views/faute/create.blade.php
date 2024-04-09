<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{-- {{ __('Controle du vehicule '.$car->matricule) }} --}}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="panel">
            <div class="card mx-auto w-1/2">
                <h1>Ajout d'une infraction</h1>
                @isset($alert)
                    <div class="alert-success">{{ $alert }}</div>
                @endisset
                <form action="{{ route('faute.store') }}" method="POST">
                    @csrf
                    <label>
                        motif
                    </label>
                    <x-text-input class="block mt-1 w-full" type="text" name="motif" placeholder="lorem ipsum dolorem"
                        required />
                    <label>
                        montant(CDF)
                    </label>
                    <x-text-input class="block mt-1 w-full" type="number" name="montant" placeholder="100.000"
                        required />
                    <button type="submit" class="btn-save">enregistrer</button>
                </form>
           
            </div>
        </div>

    </div>
</x-app-layout>
