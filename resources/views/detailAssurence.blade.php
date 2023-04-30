@isset($assurence)
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('detail de l\'assurence ' . $assurence->name) }}
            </h2>
        </x-slot>
        <div class="card">
            <h2>Nom : <span class="text-xl text-gray-900">{{ $assurence->name }}</span> </h2>
            <h2>Prix :<span class="text-xl text-gray-900">{{ $assurence->price }} Fc</span></h2>
            <h2>Description</h2>
            <p class="detail">{{ $assurence->description }}</p>
            @if (auth()->user()->statut==2)
                <div class="flex">
                <a class="btn-edit" href="{{ route('assurence.edit', ['assurence' => $assurence->id]) }}">editer</a>
                <form action="" method="post" class="flex w-full mx-4">
                    @csrf
                    @method('delete')

                    <button class="btn-danger" type="submit" href="{{ route('assurence.destroy') }}">supprimer</button>
                </form>
            </div>
            @endif
            


        </div>
    </x-app-layout>
@endisset
