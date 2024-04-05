<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('profile') }}
        </h2>
    </x-slot>
    <div class="panel">
        <div class="card mx-auto w-1/2">
            <img src="" alt="">
            <h2>Nom : {{ Auth::user()->name }}</h2>
            <h2>Mail : {{ Auth::user()->email }}</h2>
            <h2>Date d'admission : {{ Auth::user()->created_at->format('d-m-Y') }}</h2>
            <hr class="mb-8">
            <div class="flex gap-3">
                <a class="btn-show btn" href="{{ route('vehicule.index') }}">vos vehicules</a>
                <a class="btn-edit btn" href="{{ route('profile.edit') }}">editer le profil</a>
            </div>

        </div>
    </div>

</x-app-layout>
