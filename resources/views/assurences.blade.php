<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('gestion assurance') }}
        </h2>

    </x-slot>
    <div class="px-12 py-12">
        <div class="card ">
            <h2>formulaire d'assurance</h2>
            <form action="{{route('assurence.store')}}" method="post">
                @csrf
                <x-input-label for="name" class="block mt-1 w-full">nom/titre de l'assurance</x-input-label>
                <x-text-input class="block mt-1 w-full" type="text" name="name" required />
                <x-input-label for="price" class="block mt-1 w-full">prix</x-input-label>
                <x-text-input class="block mt-1 w-full" type="number" name="price" required />
                <x-input-label for="description" class="block mt-1 w-full">description</x-input-label>
                <textarea class="block mt-1 w-full " name="description">

                </textarea>
                <button type="submit" class="btn-save">enregistrer</button>
            </form>
        </div>
        <div class="card ">
            <h2>liste de assurance</h2>

            @if ($assurences->count() > 0)
                <ol class="list">
                    @foreach ($assurences as $item)
                       <li>{{$item->name}} <a class="link" href="{{route('assurence.show',['assurence'=>$item->id])}}">detail</a></li> 
                    @endforeach
                </ol>    
            @else
                <b>aucun contenue a lister</b>
            @endif
        </div>
    </div>
</x-app-layout>

