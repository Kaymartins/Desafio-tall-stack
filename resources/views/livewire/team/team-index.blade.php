<div class="max-w-6xl mx-auto">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
        <div class="col-span-3" x-data="{ open:false }" x-on:close-modal.window="open = false">
            <button type="button"
                    wire:click="create"
                    class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white cursor-pointer"
                    x-on:click="open = ! open">Criar
            </button>

            <!--MODAL-->
            @if($viewTeam)
                @include('livewire.team.view')
            @elseif($isEdit)
                @include('livewire.team.edit')
            @else
                @include('livewire.team.create')
            @endif

            <!--TABLE-->
            @component('components.table')
                @slot('style','w-full')
                @slot('header')
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Nome</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">País</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Pontuação</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>

                @endslot
                @slot('body')
                    @foreach($teams as $team)
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700"> {{$team->name}}</td>
                            <td class="p-3 text-sm text-gray-700"> {{$team->country}}</td>
                            <td class="p-3 text-sm text-gray-700"> {{$team->points}}</td>
                            <td class="p-3 text-sm text-gray-700">

                                <button type="button"
                                        class="bg-gray-700 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-gray-800 font-medium text-white cursor-pointer"
                                        x-on:click="open = ! open"
                                        wire:click="viewTeam({{$team->id}})">Visualizar
                                </button>

                                <button type="button"
                                        class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white cursor-pointer"
                                        x-on:click="open = ! open"
                                        wire:click="editTeam({{$team->id}})">Editar
                                </button>

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
