<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{-- {{ __('Controle du vehicule '.$car->matricule) }} --}}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="panel">
            @isset($alert)
                <div class="alert-success">
                    <p>{{ $alert }}</p>
                </div>
            @endisset

            <div class="card">
                <div class=" flex justify-end mb-3">
                    <a href="{{ route('faute.create') }}" class="btn-show">+ ajouter</a>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <th>N°</th>
                            <th>Motif</th>
                            <th>Montant</th>
                            <th>Date d'ajout</th>
                            <th>Derniere modification</th>
                            <th>action</th>
                        </thead>
                        @foreach ($fautes as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->motif }}</td>
                                <td>{{ $item->montant }}</td>
                                <td>{{ $item->created_at }}</td>
                                <td>{{ $item->updated_at }}</td>
                                <td class=" flex gap-2 justify-center">
                                    <a href="{{route('faute.show',$item)}}" class=" btn-show">detail</a>
                                    <a href="{{route('faute.edit',$item)}}" class="btn-edit">editer</a>
                                </td>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>

    </div>
</x-app-layout>
