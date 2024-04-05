@isset($assurence)
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-white leading-tight">
                {{ __('detail de l\'assurence ' . $assurence->name) }}
            </h2>
        </x-slot>
        <div class="panel">
            <div class="card w-[50%] mx-auto">
            <h2>Nom : <span class="text-xl text-gray-900">{{ $assurence->name }}</span> </h2>
            <h2>Prix :<span class="text-xl text-gray-900">{{ $assurence->price }} Fc</span></h2>
            <h2>Description</h2>
            <p class="detail">{{ $assurence->description }}</p>
            @if (auth()->user()->statut==2)
                <div class="flex">
                <a class="btn-edit btn" href="{{ route('assurence.edit', ['assurence' => $assurence->id]) }}">editer</a>
                <form action="{{ route('assurence.destroy',$assurence->id) }}" method="post" class="flex w-full mx-4">
                    @csrf
                    @method('delete')

                    <button class="btn-danger btn" type="submit">supprimer</button>
                </form>
            </div>
            @endif
            


        </div>
        </div>
        
    </x-app-layout>
@endisset
