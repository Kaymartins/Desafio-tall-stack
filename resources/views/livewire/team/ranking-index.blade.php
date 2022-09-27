<div class="max-w-6xl mx-auto">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <div class="col-span-3">
            <a href="{{route("championships.index")}}"
               class="bg-blue-500 mt-8 md:mt-0 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white cursor-pointer">
                Voltar
            </a>

            <!--FILTER-->
            <div class="flex flex-column md:flex-row justify-between mt-8">
                <div>
                    <select name="filter"
                             id="filter"
                             class="block w-full border border-gray-300 rounded-md"
                             wire:model="filter"
                             wire:change="changeFilter">
                        <option value="points">Pontuação</option>
                        <option value="wins">Vitorias</option>
                        <option value="defeats">Derrotas</option>
                    </select>
                </div>

                <div>
                    <input type="search" wire:model="country" wire:change="filterByCountry" id="country" autocomplete="country"
                           placeholder="País de Origem"
                           class="w-full flex-1 flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 rounded-md sm:text-sm border-gray-300">
                </div>

            </div>

            <!--TABLE-->
            @component('components.table')
                @slot('style','w-full')
                @slot('header')
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Posição</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Nome</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">País</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Pontuação</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Vitorias</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Derrotas</th>

                @endslot
                @slot('body')
                    @foreach($teams as $index => $team)
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700"> {{$index+1}}</td>
                            <td class="p-3 text-sm text-gray-700"> {{$team->name}}</td>
                            <td class="p-3 text-sm text-gray-700"> {{$team->country}}</td>
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


