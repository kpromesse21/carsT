<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('admin dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex p-6 text-gray-900">
                    {{-- {{ __("You're logged in!") }} --}}
                    <form class="flex mx-auto" action="{{ route('gestion.agent.search') }}" method="POST">
                        @csrf
                        <x-text-input id="req" class="block mt-1 w-full" type="text" name="req" required
                            autofocus />
                        {{-- btn for serch --}}
                        <x-search-button class="ml-3">
                            {{ __('search') }}
                            </x-primary-button>
                    </form>


                </div>
                @if (isset($log))
                    <div id="log"
                        class=" mx-auto w-full border-2 border-green-700 bg-green-300 text-green-700 rounded-lg mt-3 mt-3 my-2"
                        style="text-align: center; display:block">{{ $log }}</div>
                    <script>
                        var logPanel = document.getElementById('log');
                        // var errgPanel=document.getElementById('err');
                        //console.log(logPanel);
                        var i = 5;

                        function f() {
                            //console.log("fait")
                            t = setTimeout("f()", 1000);
                            if (i > 0) {
                                i--;
                            }
                            if (i <= 0) {
                                //console.log('fait')
                                logPanel.style.display = "none";
                                //errgPanel.style.display="none";
                                clearTimeout(t);
                            }
                            //  console.log(i)
                        }
                    </script>
                @endif
                <div class="mx-auto">
                    {{-- liste des utilisateur --}}
                    @if ($users->count() < 0)
                        <h2 class="text-xl text-red-500"> aucun utilisateur</h2>
                    @else
                        <table class="table rounded-xl mx-auto">
                            <thead class="bg-blue-500 text-white">
                                <td class="pl-3">nom</td>
                                <td class="pl-3">email</td>
                                <td class="pl-3">date d'enregistrement</td>
                                <td class="pl-3">statut</td>
                                <td class="pl-3">action</td>
                            </thead>
                            @foreach ($users as $user)
                                <tr class="mb-5 pb-3">
                                    <td class="pl-3">
                                        {{ $user->name }}
                                    </td>

                                    <td class="pl-3">
                                        {{ $user->email }}
                                    </td>

                                    <td class="pl-3">
                                        {{ $user->created_at }}
                                    </td>

                                    <td class="pl-3">
                                        <?php 
                                             $tab=[
                                                    '2'=>"agent de la DGI",
                                                    '3'=>"agent de la PCR",
                                                    '4'=>"simble utilisateur",
                                                ];
                                            ?>
                                        {{ $tab[$user->statut]}}
                                    </td>
                                    <td class="pl-3 bg-red-400 text-white rounded-sm hover:bg-red-800">
                                        <a href="{{ route('gestion.agent.statut', ['id' => $user->id]) }}">edit</a>
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    @endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
