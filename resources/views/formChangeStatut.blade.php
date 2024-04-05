<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('admin dashboard') }}
        </h2>
    </x-slot>


    <div class="panel">
        <div class="">
            <div class="card w-[50%] mx-auto">
                <div class="flex p-6 text-gray-900">

                    <form action="{{route('gestion.agent.statutP')}}">
                        @csrf
                        <input type="number" value="{{$id}}" name="id" hidden>
                        <label for="">changer le statut de cet utilisateur</label><br>
                        <select name="statut" id="" class="input-text mb-2">
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