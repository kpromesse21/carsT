<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('assurence') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto  lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" p-6 text-gray-900">
                    {{--  --}}
                    <h1 class="text-xl" style="text-align: center">Liste des assurences</h1>
                    <form action="{{route('assurence.search')}}" method="POST" class="flex mx-auto w-80">
                        @csrf
                        <input type="text" name="req" class="input-search " placeholder="Rechercher">
                        <button type="submit" class="btn-search flex" >
                            <svg style="color: aliceblue"
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="mt-[4px]" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                            <span>Rechercher</span>
                         </button>
                         
                        </form>
                        <div class=" items-center">
                              @forelse ($assurences as $item)
                    <div class="card">
                        Nom: {{ $item->name }} <br>
                        <b><u class="text-sky-700">Description</u></b> : <p>
                            {{ App\Http\Controllers\Assurences::extrait($item->description) }}... <u class="text-sky-900"><a href="{{route('assurence.show',["assurence"=>$item->id])}}">plus des détails</a></u></p> <br>
                    </div>
                    @empty
                    <h1 class="text-xl text-red-600 mx-auto " style="text-align: center">Aucune assurence  n'a été trouver</h1>
                    @endforelse
                </div>
                        </div>
                  
            </div>
        </div>
    </div>
</x-app-layout>
