<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
    <div wire
        class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
        <div
            class=" flex bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-800 dark:border-gray-700">
            <h3 class="inline-flex grow mt-1 text-lg text-gray-500 dark:text-gray-500">
                Aplicar
            </h3>
        </div>
        <div class="p-4 md:p-5">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <form wire:submit.prevent="save">
                                @csrf
                                <label for="cedula"
                                    class="block text-sm font-medium mb-2 dark:text-white">Cédula</label>
                                <input type="text" id="cedula" name="cedula"
                                    class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">

                                <label for="nombre"
                                    class="block text-sm font-medium mb-2 dark:text-white">Nombre</label>
                                <input type="text" id="nombre" name="nombre"
                                    class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">

                                <label for="puesto"
                                    class="block text-sm font-medium mb-2 dark:text-white">Puesto</label>
                                <input type="text" id="puesto" name="puesto"
                                    class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">

                                <label for="salario_deseado"
                                    class="block text-sm font-medium mb-2 dark:text-white">Salario Deseado</label>
                                <input type="text" id="salario_deseado" name="salario_deseado"
                                    class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">


                                <label for="recomendado_por"
                                    class="block text-sm font-medium mb-2 dark:text-white">Recomendado por</label>
                                <input type="text" id="recomendado_por" name="recomendado_por"
                                    class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">

                                <ul class="max-w-sm flex flex-col mb-4">
                                    <h3 class="mb-4 text-lg font-bold">Idiomas</h3>

                                    @foreach ($idiomas as $idioma)
                                        <li
                                            class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                            <div class="relative flex items-start w-full">
                                                <div class="flex items-center h-5">
                                                    <input id="idioma-{{ $idioma->id }}"
                                                        name="idioma-{{ $idioma->id }}" type="checkbox"
                                                        class="border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                </div>
                                                <label for="hs-list-group-item-checkbox-1"
                                                    class="ml-3.5 block w-full text-sm text-gray-600 dark:text-gray-500">
                                                    {{ $idioma->descripcion }}
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <h3 class="mb-4 text-lg font-bold">Competencias</h3>

                                <ul class="max-w-sm flex flex-col mb-4">
                                    @foreach ($competencias as $competencia)
                                        <li
                                            class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                            <div class="relative flex items-start w-full">
                                                <div class="flex items-center h-5">
                                                    <input id="competencia-{{ $competencia->id }}"
                                                        name="competencia-{{ $competencia->id }}" type="checkbox"
                                                        class="border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                </div>
                                                <label for="hs-list-group-item-checkbox-1"
                                                    class="ml-3.5 block w-full text-sm text-gray-600 dark:text-gray-500">
                                                    {{ $competencia->descripcion }}
                                                </label>
                                            </div>
                                        </li>
                                    @endforeach
                                </ul>
                                <h3 class="mb-4 text-lg font-bold">Capacitaciones</h3>
                                @foreach ($capacitaciones as $capacitacion)
                                    <div
                                        class=" my-4 flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400">
                                        <livewire:candidato-capacitacion :capacitacion="$capacitacion" :index="$loop->index"
                                            wire:key="cap-{{ $loop->index }}" />
                                    </div>
                                @endforeach
                                <button type="button" wire:click="agregar_capacitacion"
                                    class="mb-4 mx-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Agregar capacitacion
                                </button>
                                <h3 class="mb-4 text-lg font-bold">Experencia</h3>
                                @foreach ($experiencias as $experiencia)
                                    <div
                                        class=" my-4 flex flex-col bg-white border shadow-sm rounded-xl p-4 md:p-5 dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] dark:text-gray-400">
                                        <livewire:candidato-experiencia :experiencia="$experiencia" :index="$loop->index"
                                            wire:key="exp-{{ $loop->index }}" />
                                    </div>
                                @endforeach
                                <button type="button" wire:click="agregar_experiencia"
                                    class="mb-4 mx-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Agregar Experiencia
                                </button>
                                <button type="submit"
                                    class="mb-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                                    Aplicar
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
