<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight ">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    <div class="py-3">
        <div class=" ">
            <div class=" panel">
                <div class="flex p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <form action="{{ route('vehicule.search') }}" method="POST" class="flex mx-auto w-80">
                        @csrf
                        <input type="text" name="req" class="input-search " placeholder="Rechercher">
                        <button type="submit" class="btn-search flex">
                            <svg style="color: aliceblue" xmlns="http://www.w3.org/2000/svg" width="16"
                                height="16" fill="currentColor" class="mt-[4px]" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                            <span>Rechercher</span>
                        </button>
                    </form>
                </div>
                @if (isset($cars) && $cars->count() > 0)
                    <h2 style="text-align: center">véhicule(s) conrespondant à la rechercher</h2>
                @endif
                @if (isset($cars))
                    @forelse ($cars as $item)
                        <div class="card mx-auto w-1/2">
                            <h2>matricule : {{ $item->matricule }}</h2>
                            <hr>
                            <strong>categorie : {{ $item->categorie }}</strong><br>
                            <strong>categorie : {{ $item->mark }}</strong><br>
                            <a class="btn-show btn" href="{{ route('vehicule.show1', ['vehicule' => $item->id]) }}">plus
                                des
                                details</a>
                        </div>
                    @empty
                    @endforelse
                @endif

                @if (isset($assurences) && $assurences->count() > 0)
                    <h2 style="text-align: center">Assurence(s) conrespondant à la rechercher</h2>
                @endif
                @if (isset($assurences))
                    @forelse ($assurences as $item)
                        <div class="card mx-auto w-1/2">
                            Nom: {{ $item->name }} <br>
                            <b><u class="text-sky-700">Description</u></b> : <p>
                                {{ App\Http\Controllers\Assurences::extrait($item->description) }}... <a
                                    class="btn btn-show"
                                    href="{{ route('assurence.show', ['assurence' => $item->id]) }}">plus des
                                    détails</a>
                            </p> <br>
                        </div>
                    @empty
                    @endforelse
                @endif
                @if (isset($assurences) && $assurences->count() <= 0 && isset($cars) && $cars->count() <= 0)
                    <h1 class="text-xl text-red-900 mx-auto bg-red-100" style="text-align: center">| Aucun resultat n'a
                        été trouver |</h1>
                @endif
                <div class=""></div>
                @if (!isset($cars) || !isset($assurences))
                    <div class="widget-panel md:grid grid-cols-6 gap-2">
                        <div class="widget md:col-span-2">
                            <a class="weatherwidget-io" href="https://forecast7.com/fr/n1d6629d22/goma/"
                                data-label_1="GOMA" data-label_2="WEATHER" data-theme="original">GOMA WEATHER</a>
                            <script>
                                ! function(d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0];
                                    if (!d.getElementById(id)) {
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = 'https://weatherwidget.io/js/widget.min.js';
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                }(document, 'script', 'weatherwidget-io-js');
                            </script>
                        </div>
                        <div class="widget md:col-span-2">
                            <fxwidget-er inverse="false" amount="1" decimals="2" large="false" shadow="false"
                                symbol="true" flag="true" changes="true" grouping="true" border="true"
                                main-curr="USD" sel-curr="EUR,CDF,SYP" background-color="#1f567c" lang="fr"
                                border-radius="0.1"></fxwidget-er><a href="https://currencyrate.today/"
                                class="text-center block text-white">CurrencyRate</a>
                            <script async src="https://s.fx-w.io/widgets/exchange-rates/latest.js?fr"></script>
                        </div>
                        <div class="widget md:col-span-2">#1f567c</div>
                    </div>
                @endif



            </div>
        </div>
    </div>
    </div>
</x-app-layout>
