<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Controle du vehicule '.$car->matricule) }}
        </h2> --}}

    </x-slot>
    <div class="py-12">
        <div class="card">
            @isset($alert)
            <div class="alert-danger">
                <p>{{$alert}}</p>
            </div>
            @endisset
            <h1>payement des contravention</h1>
            <form action="{{ route('contravention.payement.select') }}" method="POST">
                @csrf
                <label>
                    numero de plaque
                </label>
                <x-text-input class="block mt-1 w-full" type="text" name="plaque_num" placeholder="AA-XXXXXXXXX"
                    required />
                <button type="submit" class="btn-save">rechercher</button>
            </form>
            @isset($cars)
                   <table>
                <thead>
                    <th>Matricule</th>
                    <th>Mark</th>
                    <th>Proprietaire</th>
                    <th>Nombre de contravention</th>
                    <th>Action</th>
                </thead>
                @foreach ($cars as $item)
                    <tr>
                        <td>{{$item->matricule}}</td>
                        <td>{{$item->mark}}</td>
                        <td>{{"proprietaire"}}</td>
                        <td>{{App\Models\Contraventions::where('car_id',$item->id)->get()->count()}}</td>
                        <td> <form action="{{route("contravention.payement.payer")}}" method="post"><input type="hidden" name="id"> <button type="submit">Payer</button></form> </td>
                    </tr>
                @endforeach
            </table>
            @endisset
         
        </div>
    </div>
</x-app-layout>
