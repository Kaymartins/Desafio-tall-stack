@component('components.modal')
    @slot('header')
        Criar Campeonato
    @endslot
    @slot('content')
        <div class="col-span-3">
            <label for="name" class="text-sm font-medium text-gray-700">Name</label>

            <input type="text" wire:model="name" id="name" autocomplete="name"
                   class="w-full flex-1 bg-gray-200 block w-full focus:ring-indigo-500 focus:border-indigo-500 rounded-md sm:text-sm border-gray-300"
                   readonly
                   disabled>


            <div class="text-red-500 font-bold">
                @error('name'){{$message}}@enderror
            </div>
        </div>

        <div class="col-span-3">
            <label for="game" class="text-sm font-medium text-gray-700">Jogo</label>
            <input type="text" wire:model="game" id="game" autocomplete="game"
                   class="w-full flex-1 bg-gray-200 block w-full focus:ring-indigo-500 focus:border-indigo-500 min-w-0 rounded-md sm:text-sm border-gray-300"
                   readonly
                   disabled>

            <div class="text-red-500 font-bold">
                @error('game'){{$message}}@enderror
            </div>
        </div>

        <div class="col-span">
            <label for="start_date" class="text-sm font-medium text-gray-700">Data de Inicio</label>
            <input type="date" id="start_date" wire:model="start_date" rows="2"
                   class="block w-full bg-gray-200 border border-gray-300 rounded-md"
                   readonly
                   disabled>

            <div class="text-red-500 font-bold">
                @error('start_date'){{$message}}@enderror
            </div>
        </div>

        <div class="col-span">
            <label for="end_date" class="text-sm font-medium text-gray-700">Data de Fim</label>
            <input type="date" id="end_date" wire:model="end_date"
                   class="block w-full bg-gray-200 border border-gray-300 rounded-md"
                   readonly
                   disabled>

            <div class="text-red-500 font-bold">
                @error('end_date'){{$message}}@enderror
            </div>
        </div>

        <div class="col-span-2">
            Times:
            <ul class="w-48 text-sm font-medium text-gray-900 bg-white rounded-lg border border-gray-200">
                @foreach($teams as $team)
                    @if($championship->teams()->find($team->id) != null )
                        <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 flex justify-between align-middle">{{$team->name}}
                            <button type="button" wire:click.prevent="removeTeamFromChampionship({{$championship->id}},{{$team->id}})" class="bg-red-500 text-end py-2 px-3 rounded-md shadow-sm text-sm hover:bg-red-800 font-medium text-white cursor-pointer">X</button>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>

    @endslot
@endcomponent


