<div class="grid {{ $formVisible ? 'grid-cols-2' : '' }} gap-4">
    <div wire:poll.100ms
        class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
        <div
            class=" flex bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-800 dark:border-gray-700">
            <h3 class="inline-flex grow mt-1 text-lg text-gray-500 dark:text-gray-500">
                Empleados
            </h3>
            <button wire:click="openBuscar()"
                class="flex-none py-3 px-4  justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition-all text-sm dark:focus:ring-gray-900 dark:focus:ring-offset-gray-800">
                Buscar
            </button>

        </div>
        <div class="p-4 md:p-5">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            @if ($buscar)
                                <div>
                                    <label for="persona_id"
                                        class="block text-sm font-medium mb-2 dark:text-white">Puesto</label>
                                    <select id="puesto" wire:model="buscar_puesto"
                                        class="mb-4 py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
                                        @foreach ($puestos as $puesto)
                                            <option value="{{ $puesto->id }}">{{ $puesto->nombre }}
                                            </option>
                                        @endforeach
                                    </select>

                                    <div class="grid grid-cols-3 grid-gap-4 mb-4">
                                        <div>
                                            <label
                                                class="block text-sm font-medium mb-2 dark:text-white">Idiomas</label>
                                            @foreach ($idiomas as $idioma)
                                                <ul class="max-w-sm flex flex-col">
                                                    <li
                                                        class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                                        <div class="relative flex items-start w-full">
                                                            <div class="flex items-center h-5">
                                                                <input wire:model="buscar_idiomas" type="checkbox"
                                                                    value="{{ $idioma->id }}"
                                                                    class="border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                            </div>
                                                            <label for="hs-list-group-item-checkbox-1"
                                                                class="ml-3.5 block w-full text-sm text-gray-600 dark:text-gray-500">
                                                                {{ $idioma->descripcion }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </div>

                                        <div>
                                            <label
                                                class="block text-sm font-medium mb-2 dark:text-white">Competencias</label>
                                            @foreach ($competencias as $competencia)
                                                <ul class="max-w-sm flex flex-col">
                                                    <li
                                                        class="inline-flex items-center gap-x-2 py-3 px-4 text-sm font-medium bg-white border text-gray-800 -mt-px first:rounded-t-lg first:mt-0 last:rounded-b-lg dark:bg-gray-800 dark:border-gray-700 dark:text-white">
                                                        <div class="relative flex items-start w-full">
                                                            <div class="flex items-center h-5">
                                                                <input wire:model="buscar_competencias" type="checkbox"
                                                                    value="{{ $competencia->id }}"
                                                                    class="border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                                                            </div>
                                                            <label for="hs-list-group-item-checkbox-1"
                                                                class="ml-3.5 block w-full text-sm text-gray-600 dark:text-gray-500">
                                                                {{ $competencia->descripcion }}
                                                            </label>
                                                        </div>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </div>
                                    </div>


                                </div>
                            @endif
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        @foreach (['ID', 'Cédula', 'Nombre', 'Puesto', 'Salario', 'Desde', 'Estado'] as $columna)
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                {{ $columna }}</th>
                                        @endforeach
                                        <th scope="col"
                                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($empleados as $empleado)
                                        <tr>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ $empleado->id }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ $empleado->persona->cedula }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ $empleado->persona->nombre }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                @if (!is_null($empleado->puesto))
                                                    {{ $empleado->puesto->nombre }}
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ $empleado->salario }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ $empleado->desde }}
                                            </td>
                                            <td
                                                class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                {{ $empleado->activo ? '✅' : '❌' }}
                                            </td>
                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <div class="btn-group" role="group">
                                                    <button type="button"
                                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                                        wire:click="show({{ $empleado->id }})">Ver</button>
                                                    <button type="button"
                                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                                        wire:click="update({{ $empleado->id }})">Editar</button>
                                                    <button
                                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                                        wire:click="$emit('confirmDelete', {{ $empleado->id }}, '{{ json_encode($empleado::class) }}', '{{ $empleado->persona->nombre }}', )"
                                                        type="button">Borrar</button>

                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @if ($formVisible)
        <livewire:empleado-form :empleado="$currentEmpleado" />
    @endif
</div>
