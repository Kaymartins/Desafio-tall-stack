@component('components.modal')
    @slot('header')
        Editar Time
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
        <button type="submit" wire:click.prevent="updateTeam"
                class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white">
            Editar Time
        </button>
    @endslot
@endcomponent

