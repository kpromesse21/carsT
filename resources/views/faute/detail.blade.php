<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{-- {{ __('Controle du vehicule '.$car->matricule) }} --}}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="panel">
            <div class="card">
                detail faute
                <p>motif : {{$faute->motif}}</p>
                <p>montant : {{$faute->montant}}</p>
            </div>
        </div>

    </div>
</x-app-layout>
