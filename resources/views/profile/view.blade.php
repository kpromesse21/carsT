<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('profile') }}
        </h2>
    </x-slot>
    <div class="card">
        <img src="" alt="">
        <h2>Nom : {{Auth::user()->name}}</h2>
        <h2>Mail : {{Auth::user()->email}}</h2>
        <h2>Date d'admission : {{Auth::user()->created_at->format('d-m-Y')}}</h2>
        <hr class="mb-8">
        <a class="btn-edit" href="{{route('vehicule.index')}}">vos vehicules</a>
        <a class="btn-edit" href="{{route('profile.edit')}}">editer le profil</a>
    </div>
</x-app-layout>