<div wire:poll>
    <div
        class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
        <div
            class=" flex bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-800 dark:border-gray-700">
            <h3 class="inline-flex grow mt-1 text-lg text-gray-500 dark:text-gray-500">
                @if ($record->id)
                    Actualizar {{ $record->id }}
                @else
                    Crear
                @endif
            </h3>
        </div>
        <div class="p-4 md:p-5">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <form wire:submit.prevent="save">
                                @csrf
                                <label for="descripcion"
                                    class="block text-sm font-medium mb-2 dark:text-white">Descripcion</label>
                                <input type="text" id="descripcion" name="descripcion"
                                    wire:model="record.descripcion"
                                    class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                @error('record.descripcion')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror
                                <div class="flex mb-2">
                                    <input type="checkbox" id="activo" name="activo" wire:model="record.activo"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                    <label for="activo" class="text-sm text-gray-500 ml-3 dark:text-gray-400">Estado
                                    </label>
                                </div>
                                @error('record.activo')
                                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                                @enderror

                                <button type="submit"
                                    class="mb-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    @if ($record->id)
                                        Actualizar
                                    @else
                                        Crear
                                    @endif
                                </button>
                                <button type="button" wire:click="cancel";
                                    class="mb-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Cancelar
                                </button>


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
