<div class="max-w-6xl mx-auto">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <div class="col-span-3" x-data="{ open:false }">
            <button type="button" wire:click="clearForm" class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white cursor-pointer" x-on:click="open = ! open">Criar</button>

            <!--MODAL-->
            @component('components.modal')
                @slot('header')
                    @if($isEdit)
                        Editar {{$title ?? null}}
                    @else
                        Criar {{$title ?? null}}
                    @endif
                @endslot
                @slot('content')
                    <div class="col-span-3">
                        <label for="name" class="text-sm font-medium text-gray-700">Name</label>
                        <input type="text" wire:model="name" id="name" autocomplete="name" class="w-full flex-1 flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 rounded-md sm:text-sm border-gray-300">
                        <div class="text-red-500 font-bold">
                            @error('name'){{$message}}@enderror
                        </div>
                    </div>
                    <div class="col-span-1">
                        <label for="age" class="text-sm font-medium text-gray-700">Idade</label>
                        <input type="number" wire:model="age" id="age" autocomplete="age" class="w-full flex-1 flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-md sm:text-sm border-gray-300">
                        <div class="text-red-500 font-bold">
                            @error('age'){{$message}}@enderror
                        </div>
                    </div>
                    <div class="col-span-2">
                        <label for="nationality" class="text-sm font-medium text-gray-700">Nacionalidade</label>
                        <input type="text" id="nationality" wire:model="nationality" rows="2" class="block w-full border border-gray-300 rounded-md">
                        <div class="text-red-500 font-bold">
                            @error('nationality'){{$message}}@enderror
                        </div>
                    </div>

                    <div class="col-span">
                        <label for="wins" class="text-sm font-medium text-gray-700">Vitorias</label>
                        <input type="number" id="wins" wire:model="wins" class="block w-full border border-gray-300 rounded-md">
                        <div class="text-red-500 font-bold">
                            @error('wins'){{$message}}@enderror
                        </div>
                    </div>

                    <div class="col-span">
                        <label for="defeats" class="text-sm font-medium text-gray-700">Derrotas</label>
                        <input type="number" id="defeats" wire:model="defeats" class="block w-full border border-gray-300 rounded-md">
                        <div class="text-red-500 font-bold">
                            @error('defeats'){{$message}}@enderror
                        </div>
                    </div>
                @endslot
                @slot('option')
                    @if($isEdit)
                        <button type="submit" x-on:click="open = false" wire:click.prevent="updatePlayer" class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white">Editar Jogador</button>
                    @else
                        <button type="submit" x-on:click="open = false" wire:click.prevent="submit" class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white">Criar Jogador</button>
                    @endif
                @endslot
            @endcomponent

            <!--TABLE-->
            <div class="w-full col-span-3 mt-8">
                <table class="w-full">
                    <thead class="bg-gray-50 border-b-2 border-gray-200">
                    <tr>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Nome</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Idade</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left">Nacionalidade</th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>
                        <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($players as $player)
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700"> {{$player->name}}</td>
                            <td class="p-3 text-sm text-gray-700"> {{$player->age}}</td>
                            <td class="p-3 text-sm text-gray-700"> {{$player->nationality}}</td>
                            <td class="p-3 text-sm text-gray-700">
                                <button type="button" class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white cursor-pointer" x-on:click="open = ! open"
                                wire:click="editPlayer({{$player->id}})">Editar</button>
                            </td>
                            <td class="p-3 text-sm text-gray-700">
                                <button type="button" class="bg-red-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-red-800 font-medium text-white cursor-pointer"
                                wire:click="deletePlayer({{$player->id}})">Excluir</button>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
