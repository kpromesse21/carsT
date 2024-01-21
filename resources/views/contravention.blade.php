<x-app-layout>
    <x-slot name="header">
        {{-- <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Controle du vehicule '.$car->matricule) }}
        </h2> --}}
      
    </x-slot> 
     <div class="py-12">
            <div class="card">
                <form action="">
                    <label>
                        Degre de faute
                    </label>
                    <x-text-input class="block mt-1 w-full" type="number" name="mail" placeholder="ex: 6/10" required />
                    <label for="">Motif de la contravention</label>
                    <select name="" id="" class="input-select">
                        <option value="">mauvais parking</option>
                        <option value="">mauvaise conduite</option>
                        <option value="">pas d'assurence</option>
                        <option value="">griller un feu rouge</option>
                        <option value="">causer un accident</option>
                        <option value="">manque de document</option>
                        <option value="">retard de payement des contraventions</option>
                    </select>
                    <button type="submit" class="btn-save">enregistrer</button> <a href="" class="btn-danger">annuler</a>
                </form>
            </div>
        </div>
</x-app-layout>