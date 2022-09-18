@component('components.modal')
    @slot('header')
        Criar Campeonato
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

        <div class="col-span-3">
            <label for="game" class="text-sm font-medium text-gray-700">Jogo</label>
            <input type="text" wire:model="game" id="game" autocomplete="game"
                   class="w-full flex-1 flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-md sm:text-sm border-gray-300">
            <div class="text-red-500 font-bold">
                @error('game'){{$message}}@enderror
            </div>
        </div>

        <div class="col-span">
            <label for="start_date" class="text-sm font-medium text-gray-700">Data de Inicio</label>
            <input type="date" id="start_date" wire:model="start_date" rows="2"
                   class="block w-full border border-gray-300 rounded-md">
            <div class="text-red-500 font-bold">
                @error('start_date'){{$message}}@enderror
            </div>
        </div>

        <div class="col-span">
            <label for="end_date" class="text-sm font-medium text-gray-700">Data de Fim</label>
            <input type="date" id="end_date" wire:model="end_date"
                   class="block w-full border border-gray-300 rounded-md">
            <div class="text-red-500 font-bold">
                @error('end_date'){{$message}}@enderror
            </div>
        </div>

        <div class="col-span-2">
            <label for="team_id" class="text-sm font-medium text-gray-700">Adicionar novos times</label>
            <select name="team_id[]"
                    id="team_id"
                    class="block w-full border border-gray-300 rounded-md multiple"
                    wire:model="selectedTeams"
                    multiple>
                @foreach($teams as $team)
                    @if($championship->teams()->find($team->id) == null)
                        <option value="{{$team->id}}">{{$team->name}}</option>
                    @endif
                @endforeach
            </select>
        </div>

    @endslot

    @slot('option')
        <button type="submit" wire:click.prevent="updateChampionship"
                class="bg-blue-500 py-2 mr-1 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white">
            Confirmar Alterações
        </button>
    @endslot

@endcomponent

