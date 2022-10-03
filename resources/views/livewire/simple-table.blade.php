<div class="grid {{ $formVisible ? 'grid-cols-2' : '' }} gap-4">
    <div wire:poll.100ms
        class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
        <div
            class=" flex bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-800 dark:border-gray-700">
            <h3 class="inline-flex grow mt-1 text-lg text-gray-500 dark:text-gray-500">
                {{ str($resource)->headline() }}
            </h3>
            @if (!$perfil)
                <button wire:click="create"
                    class="flex-none py-3 px-4  justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition-all text-sm dark:focus:ring-gray-900 dark:focus:ring-offset-gray-800">
                    Crear
                </button>
            @endif
        </div>
        <div class="p-4 md:p-5">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                <thead>
                                    <tr>
                                        @foreach ($columns as $c)
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                                {{ $c }}</th>
                                        @endforeach
                                        @if (!$perfil)
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                            </th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                                    @foreach ($records as $r)
                                        <tr>
                                            @foreach ($columns as $c)
                                                <td
                                                    class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-gray-200">
                                                    @if ($c == 'activo')
                                                        {{ $r->activo ? '✅' : '❌' }}
                                                    @else
                                                        {{ $r[$c] }}
                                                    @endif
                                                </td>
                                            @endforeach
                                            @if (!$perfil)
                                                <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                    <div class="btn-group" role="group">
                                                        <button type="button"
                                                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                                            wire:click="show({{ $r->id }})">Ver</button>
                                                        <button type="button"
                                                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                                            wire:click="update({{ $r->id }})">Editar</button>
                                                        <button
                                                            class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                                            wire:click="$emit('confirmDelete', {{ $r->id }}, '{{ json_encode($r::class) }}', '{{ $r->descripcion }}', )"
                                                            type="button">Borrar</button>

                                                    </div>
                                                </td>
                                            @endif
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
        <livewire:simple-form :record="$currentRecord" :resource="$resource" />
    @endif
    @if ($showVisible)
        <livewire:simple-show :record="$currentRecord" :resource="$resource" />
    @endif
</div>
