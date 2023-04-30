<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('admin dashboard') }}
        </h2>
    </x-slot>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-6 text-gray-900">

                    <form action="{{route('gestion.agent.statutP')}}">
                        @csrf
                        <input type="number" value="{{$id}}" name="id" hidden>
                        <label for="">changer le statut de cet utilisateur</label><br>
                        <select name="statut" id="">
                            <option value="2">agent de la DGI</option>
                            <option value="3">agent de la PCR</option>
                            <option value="4">proprietaire</option>
                        </select>
                        <x-primary-button>change</x-primary-button>
                    </form>
                </div>
            </div>
        </div>



</x-app-layout>