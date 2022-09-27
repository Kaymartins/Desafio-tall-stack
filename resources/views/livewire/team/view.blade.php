@component('components.modal')
    @slot('header')
        Ver Time
    @endslot
    @slot('content')
        <div class="col-span-3">
            <label for="name" class="text-sm font-medium text-gray-700">Name</label>
            <input type="text" wire:model="name" id="name" autocomplete="name"
                   class="w-full flex-1 bg-gray-200 flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 rounded-md sm:text-sm border-gray-300" readonly disabled>
            <div class="text-red-500 font-bold">
                @error('name'){{$message}}@enderror
            </div>
        </div>
        <div class="col-span-1">
            <label for="country" class="text-sm font-medium text-gray-700">País</label>
            <input type="text" wire:model="country" id="country" autocomplete="country"
                   class="w-full flex-1 bg-gray-200 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-md sm:text-sm border-gray-300" readonly disabled>
            <div class="text-red-500 font-bold">
                @error('country'){{$message}}@enderror
            </div>
        </div>
        <div class="col-span-2">
            <label for="points" class="text-sm font-medium text-gray-700">Pontuação</label>
            <input type="number" id="points" wire:model="points" rows="2"
                   class="block w-full bg-gray-200 border border-gray-300 rounded-md" readonly disabled>
            <div class="text-red-500 font-bold">
                @error('points'){{$message}}@enderror
            </div>
        </div>

        <div class="col-span">
            <label for="wins" class="text-sm font-medium text-gray-700">Vitorias</label>
            <input type="number" id="wins" wire:model="wins"
                   class="block w-full bg-gray-200 border border-gray-300 rounded-md" readonly disabled>
            <div class="text-red-500 font-bold">
                @error('wins'){{$message}}@enderror
            </div>
        </div>

        <div class="col-span">
            <label for="defeats" class="text-sm font-medium text-gray-700">Derrotas</label>
            <input type="number" id="defeats" wire:model="defeats"
                   class="block w-full bg-gray-200 border border-gray-300 rounded-md" readonly disabled>
            <div class="text-red-500 font-bold">
                @error('defeats'){{$message}}@enderror
            </div>
        </div>

        <div class="col-span-3" x-data="{ open:false }">
            <button type="button"
                    class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white cursor-pointer"
                    x-on:click="open = ! open">Ver jogadores
            </button>

            <div x-show="open" class="overflow-auto">

                @component('components.table')
                    @slot('header')
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Nome</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Idade</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Nacionalidade</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>
                    @endslot
                    @slot('body')
                        @foreach($playersOnTeam as $player)
                            <tr>
                                <td class="p-3 text-sm text-gray-700"> {{$player->name}}</td>
                                <td class="p-3 text-sm text-gray-700"> {{$player->age}}</td>
                                <td class="p-3 text-sm text-gray-700"> {{$player->nationality}}</td>
                                <td>
                                    <button type="button" wire:click.prevent="removePlayerFromTeam({{$player->id}})" class="bg-red-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-red-800 font-medium text-white cursor-pointer">X</button>
                                </td>
                            </tr>
                        @endforeach
                    @endslot
                @endcomponent
            </div>
        </div>
    @endslot

@endcomponent

