@isset($assurence)
   <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('detail de l\'assurence '.$assurence->name) }}
        </h2>
    </x-slot>
    <div class="panel">
        <div class="card ">
        <h2>edit de l'assurence {{$assurence->name}}</h2>
        <form method="POST" action="{{route('assurence.update',['assurence'=>$assurence->id])}}" >
            @csrf
            @method('put')
            <x-input-label for="name" class="block mt-1 w-full">nom/titre de l'assurence</x-input-label>
            <x-text-input class="block mt-1 w-full" type="text" name="name" value="{{$assurence->name}}" required />
            <x-input-label for="price" class="block mt-1 w-full">prix</x-input-label>
            <x-text-input class="block mt-1 w-full" type="number" name="price" value="{{$assurence->price}}" required />
            <x-input-label for="description" class="block mt-1 w-full">description</x-input-label>
            <textarea class=" input-text" name="description">{{$assurence->description}}
            </textarea>
            <button type="submit" class="btn-save">enregistrer</button>
        </form>
    </div>
    </div>
    
</x-app-layout> 
@endisset
