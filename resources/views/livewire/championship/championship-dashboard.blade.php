<div class="max-w-6xl mx-auto">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <div class="col-span-3">
            <a href="{{ url()->previous() }}"
                    class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white cursor-pointer">
                Voltar
            </a>

            <div class="flex flex-col bg-white shadow-2xl rounded-lg border-gray-400 p6 mt-16">

                <div class="px-6 py-2">
                    <h3 class="text-lg font-medium text-rose-800 py-4">
                        <p class="text-2xl font-bold">Campeonato "{{$name}}"</p>
                    </h3>

                        <div class="sm:grid sm:grid-cols sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                            <p class="font-bold">Data de Inicio : {{date('d/m/Y',strtotime($start_date))}}</p><br>
                            <p class="font-bold">Data de Fim : {{date('d/m/Y',strtotime($end_date))}}</p>

                            <div class="col-span-2 gap-1">

                                <p class="text-2xl">Times:</p>


                                <!--TABLE-->
                                @component('components.table')
                                    @slot('style','w-full')
                                    @slot('header')
                                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Colocação</th>
                                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Nome</th>
                                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Pontuação</th>
                                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Vitorias</th>
                                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Derrotas</th>
                                        <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>

                                    @endslot
                                    @slot('body')
                                        @foreach($teams as $index => $team)
                                            <tr class="bg-white">
                                                <td class="p-3 text-sm text-gray-700"> {{$index+1}}</td>
                                                <td class="p-3 text-sm text-gray-700"> {{$team->name}}</td>
                                                <td class="p-3 text-sm text-gray-700"> {{$team->points}}</td>
                                                <td class="p-3 text-sm text-gray-700"> {{$team->wins}}</td>
                                                <td class="p-3 text-sm text-gray-700"> {{$team->defeats}}</td>
                                            </tr>
                                        @endforeach
                                    @endslot
                                @endcomponent
                            </div>
                        </div>

                </div>
            </div>

        </div>
    </div>
</div>

