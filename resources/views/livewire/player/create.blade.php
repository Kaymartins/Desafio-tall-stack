@component('components.modal')
    @slot('header')
        Criar Jogador
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
            <label for="age" class="text-sm font-medium text-gray-700">Idade</label>
            <input type="number" wire:model="age" id="age" autocomplete="age"
                   class="w-full flex-1 flex-1 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-md sm:text-sm border-gray-300">
            <div class="text-red-500 font-bold">
                @error('age'){{$message}}@enderror
            </div>
        </div>

        <div class="col-span-2">
            <label for="nationality" class="text-sm font-medium text-gray-700">Nacionalidade</label>
            <input type="text" id="nationality" wire:model="nationality" rows="2"
                   class="block w-full border border-gray-300 rounded-md">
            <div class="text-red-500 font-bold">
                @error('nationality'){{$message}}@enderror
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

        <div class="col-span">
            <label for="team_id" class="text-sm font-medium text-gray-700">Time</label>
            <select name="team_id"
                    id="team_id"
                    class="block w-full border border-gray-300 rounded-md"
                    wire:model="team_id">
                <option value={{null}}>Selecione um time</option>
                @foreach($teams as $team)
                    <option value="{{$team->id}}">{{$team->name}}</option>
                @endforeach
            </select>
        </div>

    @endslot

    @slot('option')
        <button type="submit" wire:click.prevent="submit"
                class="bg-blue-500 py-2 mr-1 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white">
            Criar Jogador
        </button>
    @endslot

@endcomponent
