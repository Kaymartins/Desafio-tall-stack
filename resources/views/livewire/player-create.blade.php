<div>
    <div class="px-6 py-2">
        <h3 class="text-lg font-medium text-rose-800">Jogador</h3>
        <form wire:submit.prevent="submit" class="space-y-8 divide-y divide-gray-200">
            <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
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
                

                <div class="col-span-2">
                    <button type="submit" class="bg-blue-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-purple-500 font-medium text-white">Adicionar Jogador</button>
                </div>
            </div>
        </form>
    </div>
    
</div>
