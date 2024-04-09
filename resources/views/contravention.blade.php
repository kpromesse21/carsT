<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Controle du vehicule ') }}
        </h2>

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
                
                        value="{{isset($car) ?$car->matricule : null}}"
                  
                    required />
                {{-- <x-text-input class="block mt-1 w-full" type="number" name="mail" placeholder="ex: 6/10" required /> --}}
                <label for="">Motif de la contravention</label>
                <select name="motif" id="" class="input-text">
                    @foreach ($fautes as $item)
                        <option value="{{$item->id}}">{{$item->motif}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn-save">enregistrer</button> 
                {{-- <a href="/" class="btn-danger">dashboard</a> --}}
            </form>
        </div>
        </div>
        
    {{-- </div> --}}
</x-app-layout>
