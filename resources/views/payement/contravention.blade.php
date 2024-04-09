<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{-- {{ __('Controle du vehicule '.$car->matricule) }} --}}
        </h2>

    </x-slot>
    <div class="py-12">
        <div class="panel">
            <div class="card mx-auto">
                <h1>Payement des contravention</h1>
                @isset($alert)
                    <div class="alert-success">{{ $alert }}</div>
                @endisset
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
                <div class="table my-3">
                    <table class="">
                        <thead>
                            <th>Matricule</th>
                            <th>Mark</th>
                            <th>Proprietaire</th>
                            <th>N contraventions</th>
                            <th>Action</th>
                        </thead>
                        @foreach ($cars as $item)
                            <tr>
                                <td>{{ $item->matricule }}</td>
                                <td>{{ $item->mark }}</td>
                                <td>{{ App\Models\User::find($item->user_id)->name }}</td>
                                <td>{{ App\Models\Contraventions::where('car_id', $item->id)->where('solve',false)->get()->count() }}</td>
                                <td>
                                    <a href="{{ route('contravention.payement.list', ['car' => $item->id]) }}">payer</a>
                                    {{-- <form action="{{route("contravention.payement.payer")}}" method="post">@csrf <input type="hidden" name="id" value="{{$item->id}}"> <button type="submit">Payer</button></form>  --}}
                                </td>
                            </tr>
                        @endforeach
                    </table></div>
                    
                @endisset

            </div>
        </div>

    </div>
</x-app-layout>
