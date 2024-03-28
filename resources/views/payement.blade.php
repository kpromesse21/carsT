<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('payement') }}
        </h2>
    </x-slot>
    {{-- payement assurence --}}
    @if (isset($log))
        <div class="alert-success" id="alert-success" style="display:block">
            {{ $log }}
        </div>
        <script>
            var logPanel = document.getElementById('alert-success');
            var i = 5;

            function f() {
                t = setTimeout("f()", 1000);
                if (i > 0) {
                    i--;
                }
                if (i <= 0) {
                    logPanel.style.display = "none";
                    clearTimeout(t);
                }
            }
        </script>
    @endif
    @if (isset($erros))
        <div class="alert-danger" id="alert-danger" style="display: block">
            {{ $erros }}
        </div>
        <script>
            var errgPanel = document.getElementById('alert-danger');
            var logPanel = document.getElementById('alert-success');
            var i = 5;

            function f() {
                t = setTimeout("f()", 1000);
                if (i > 0) {
                    i--;
                }
                if (i <= 0) {
                    errgPanel.style.display = "none";
                    logPanel.style.display = "none";
                    clearTimeout(t);
                }
            }
        </script>
    @endif
    <div class="panel">
        <div class="card w-[50%] mx-auto">
        <h2>Payement assurence</h2>
        <form action="{{ route('payement.store') }}" method="POST">
            @csrf
            <x-input-label for="name" class="block mt-1 w-full">Matricule du vehicule</x-input-label>
            <x-text-input class="block mt-1 w-full" type="text" name="matricule" required />
            <label for="">
                Assurence a payer </label>
            <select name="assurence" id="" class="input-text" required>
                <option class="text-gray-400" value="">Choisir une assurence...</option>
                @foreach ($assurences as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach

            </select>
            <button type="submit" class="btn-save">Confirmer</button>
        </form>
    </div>
    </div>
    
    {{-- payement taxe --}}
    {{-- <div class="card">
        <h2>payement taxes</h2>
    </div> --}}
</x-app-layout>
