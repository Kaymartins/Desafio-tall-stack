<div class="max-w-6xl mx-auto">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <div class="col-span-3" x-data="{ open:false }">
            <button type="button" wire:click="clearForm"
                    class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white cursor-pointer"
                    x-on:click="open = ! open">Criar
            </button>

            <!--MODAL-->
            @component('components.modal')
                @slot('header')
                    @if($isEdit)
                        Editar Time
                    @else
                        Criar Time
                    @endif
                @endslot
                @slot('content')
                    <div class="col-span-3">
                        <label for="name" class="text-sm font-medium text-gray-700">Name</label>
                        <input type="text" wire:model="name" id="name" autocomplete="name"
                               class="w-full flex-1 flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 rounded-md sm:text-sm border-gray-300">
                        <div class="text-red-500 font-bold">
                            @error('name'){{$message}}@enderror
                        </div>
                    </div>
                    <div class="col-span-1">
                        <label for="country" class="text-sm font-medium text-gray-700">País</label>
                        <input type="text" wire:model="country" id="country" autocomplete="country"
                               class="w-full flex-1 flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-md sm:text-sm border-gray-300">
                        <div class="text-red-500 font-bold">
                            @error('country'){{$message}}@enderror
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="points" class="text-sm font-medium text-gray-700">Pontuação</label>
                        <input type="number" id="points" wire:model="points" rows="2"
                               class="block w-full border border-gray-300 rounded-md">
                        <div class="text-red-500 font-bold">
                            @error('points'){{$message}}@enderror
                        </div>
                    </div>

                    <div class="col-span">
                        <label for="wins" class="text-sm font-medium text-gray-700">Vitorias</label>
                        <input type="number" id="wins" wire:model="wins"
                               class="block w-full border border-gray-300 rounded-md">
                        <div class="text-red-500 font-bold">
                            @error('wins'){{$message}}@enderror
                        </div>
                    </div>

                    <div class="col-span">
                        <label for="defeats" class="text-sm font-medium text-gray-700">Derrotas</label>
                        <input type="number" id="defeats" wire:model="defeats"
                               class="block w-full border border-gray-300 rounded-md">
                        <div class="text-red-500 font-bold">
                            @error('defeats'){{$message}}@enderror
                        </div>
                    </div>
                @endslot
                @slot('option')
                    @if($isEdit)
                        <button type="submit" x-on:click="open = false" wire:click.prevent="updatePlayer"
                                class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white">
                            Editar Jogador
                        </button>
                    @else
                        <button type="submit" x-on:click="open = false" wire:click.prevent="submit"
                                class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white">
                            Criar Jogador
                        </button>
                    @endif
                @endslot
            @endcomponent

            <!--TABLE-->
            @component('components.table')
                @slot('header')
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Nome</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">País</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Pontuação</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>
                @endslot
                @slot('body')
                    @foreach($teams as $team)
                        Jogadores:
                        @foreach($team->find($team->id)->players as $player)
                            {{$player->name}}
                        @endforeach
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700"> {{$team->name}}</td>
                            <td class="p-3 text-sm text-gray-700"> {{$team->country}}</td>
                            <td class="p-3 text-sm text-gray-700"> {{$team->points}}</td>
                            <td class="p-3 text-sm text-gray-700">
                                <button type="button"
                                        class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white cursor-pointer"
                                        x-on:click="open = ! open"
                                        wire:click="editTeam({{$team->id}})">Editar
                                </button>
                            </td>
                            <td class="p-3 text-sm text-gray-700">
                                <button type="button"
                                        class="bg-red-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-red-800 font-medium text-white cursor-pointer"
                                        wire:click="deleteTeam({{$team->id}})">Excluir
                                </button>
                            </td>
                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>
    </div>
</div>
</div>
