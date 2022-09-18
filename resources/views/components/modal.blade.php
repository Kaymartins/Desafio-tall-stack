<div x-show="open">
    <div :class="{'block':open, 'hidden': ! open}" class="hidden fixed inset-0 bg-white bg-opacity-75 flex flex-col items-center justify-start pt-10 overflow-auto">
        <div class="flex flex-col bg-white shadow-2xl rounded-lg border-gray-400 p6">

            <div class="px-6 py-2">
                <h3 class="text-lg font-medium text-rose-800">
                     {{$header ?? null}}
                </h3>
                <form class="space-y-8 divide-y divide-gray-200">
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                        {{$content ?? null}}

                        <div class="col-span-2 gap-1">

                            {{$option ?? null }}

                            <button type="button" x-on:click="open = false" wire:click.prevent="clearForm" class="bg-red-500 py-2 px-3 rounded-md shadow-sm text-sm hover:bg-red-800 font-medium text-white cursor-pointer">Fechar</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
