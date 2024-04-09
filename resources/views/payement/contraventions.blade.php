<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Controle du vehicule '.$car->matricule) }}
        </h2> --}}

    </x-slot>
    <div class="py-12">
        <div class="card mx-auto">
          
            @isset($alert)
            <div class="alert-danger">
                <p>{{$alert}}</p>
            </div>
            @endisset
            @isset($matricule)
            <h1>Contravention(s) au matricule  {{$matricule}}  </h1>
            @endisset
            @isset($contraventions)
                   <table class=" table">
                <thead>
                    <th>Motif</th>
                    <th>Motant (CDF)</th>
                    <th>Date</th>
                    <th>Action</th>
                </thead>
                @foreach ($contraventions as $item)
                    <tr>
                     <td class=" text-left justify-start">{{$item->motif}}</td>
                     <td>{{$item->montant}}</td>
                     <td>{{$item->created_at->format('d-m-Y')}}</td>
                     <td><form action="{{route('contravention.payement.payer')}}" method="post">@csrf <input type="hidden" name="id" value="{{$item->id}}"><button type="submit">Payer</button></form></td>
                     
                    </tr>
                @endforeach
            </table>
            @endisset
         
        </div>
    </div>
</x-app-layout>
