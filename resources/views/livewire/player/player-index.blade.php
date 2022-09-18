<div class="max-w-6xl mx-auto">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">

        <div class="col-span-3" x-data="{ open:false }" x-on:close-modal.window="open = false">
            <button type="button"
                    wire:click="create"
                    class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white cursor-pointer"
                    x-on:click="open = ! open">Criar
            </button>

            <!--MODAL-->
            @if($viewPlayer)
                @include('livewire.player.view')

            @elseif($isEdit)
                @include('livewire.player.edit')

            @else
                @include('livewire.player.create')
            @endif


            <!--TABLE-->
            @component('components.table')
                @slot('style','w-full')
                @slot('header')
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Nome</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Idade</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left">Nacionalidade</th>
                    <th class="p-3 text-sm font-semibold tracking-wide text-left"></th>
                @endslot
                @slot('body')
                    @foreach($players as $player)
                        <tr class="bg-white">
                            <td class="p-3 text-sm text-gray-700"> {{$player->name}}</td>
                            <td class="p-3 text-sm text-gray-700"> {{$player->age}}</td>
                            <td class="p-3 text-sm text-gray-700"> {{$player->nationality}}</td>

                            <td class="p-3 text-sm text-gray-700">
                                <button type="button"
                                        class="bg-gray-700 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-gray-800 font-medium text-white cursor-pointer"
                                        x-on:click="open = ! open"
                                        wire:click="viewPlayer({{$player->id}})">Visualizar
                                </button>

                                <button type="button"
                                        class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white cursor-pointer"
                                        x-on:click="open = ! open"
                                        wire:click="editPlayer({{$player->id}})">Editar
                                </button>

                                <button type="button"
                                        class="bg-red-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-red-800 font-medium text-white cursor-pointer"
                                        wire:click="deletePlayer({{$player->id}})">Excluir
                                </button>
                            </td>

                        </tr>
                    @endforeach
                @endslot
            @endcomponent
        </div>
    </div>
</div>


