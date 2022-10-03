<div class="grid grid-cols-2 gap-4" wire:poll>
    <div
        class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
        <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-800 dark:border-gray-700">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-500">
                Candidato Seleccionado
            </p>
        </div>
        <div class="p-4 md:p-5">
            @if (is_null($puesto->empleado))
                <p class="mt-2 text-gray-800 dark:text-gray-400">
                    N/A
                </p>
            @else
                <p class="mt-2 text-gray-800 dark:text-gray-400">
                    Contratado: {{ $puesto->empleado->persona->nombre }}
                </p>
            @endif

        </div>
    </div>
    <div
        class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
        <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-800 dark:border-gray-700">
            <p class="mt-1 text-sm text-gray-500 dark:text-gray-500">
                Candidatos
            </p>
        </div>
        <div class="p-4 md:p-5">
            <ul class="max-w-xs flex flex-col">
                @foreach ($puesto->candidatos as $candidato)
                    <li
                        class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                        <button wire:click="seleccionar({{ $candidato->id }})" type="button">
                            {{ $candidato->persona->nombre }}
                        </button>
                    </li>
                @endforeach

            </ul>
        </div>
    </div>
    @if ($candidato_seleccionado)
        <div
            class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
            <div
                class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-800 dark:border-gray-700">
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-500">
                    Candidato Seleccionado: {{ $candidato_seleccionado->persona->nombre }} -
                    {{ $candidato_seleccionado->persona->cedula }}
                </p>
            </div>
            <div class="p-4 md:p-5">
                <label for="salario_deseado" class="block text-sm font-medium mb-2 dark:text-white">Salario</label>
                <input id="salario" name="salario_deseado" type="number" step="0.1" wire:model="salario"
                    class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">

                <button type="button" wire:click="contratar()"
                    class="mb-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                    Contratar
                </button>
            </div>
        </div>
    @endif

    <!-- ... -->
</div>
