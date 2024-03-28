<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('gestion assurance') }}
        </h2>

    </x-slot>
    <div class="panel grid md:grid-cols-6">
        <div class="card col-span-3 ">
            <h2>formulaire d'assurance</h2>
            <form action="{{route('assurence.store')}}" method="post">
                @csrf
                <x-input-label for="name" class="block mt-1 w-full">nom/titre de l'assurance</x-input-label>
                <x-text-input class="block mt-1 w-full" type="text" name="name" required />
                <x-input-label for="price" class="block mt-1 w-full">prix</x-input-label>
                <x-text-input class="block mt-1 w-full" type="number" name="price" required />
                <x-input-label for="description" class="block mt-1 w-full">description</x-input-label>
                <textarea class="input-text " name="description">

                </textarea>
                <button type="submit" class="btn-save">enregistrer</button>
            </form>
        </div>
        <div class="card  col-span-3">
            <h2>liste de assurance</h2>
            @if ($assurences->count() > 0)
            <div class="table">
                <table>
                <thead>
                    <th>Nom</th>
                    <th>Prix</th>
                    <th>Action</th>
                </thead>
                @foreach ($assurences as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->price}} CDF</td>
                    <td><a class="link" href="{{route('assurence.show',['assurence'=>$item->id])}}">detail</a></td>
                </tr>
                @endforeach
            </table></div>
           
            @else
                <b>aucun contenue a lister</b>
            @endif
        </div>
    </div>
</x-app-layout>

