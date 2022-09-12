<div
    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
    <div class=" flex bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-800 dark:border-gray-700">
        <h3 class="inline-flex grow mt-1 text-lg text-gray-500 dark:text-gray-500">
            {{str($resource)->headline()}}
        </h3>
        <a href="{{ route("$resource.create") }}"
            class="flex-none py-3 px-4  justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-gray-800 text-white hover:bg-gray-900 focus:outline-none focus:ring-2 focus:ring-gray-800 focus:ring-offset-2 transition-all text-sm dark:focus:ring-gray-900 dark:focus:ring-offset-gray-800">
            Crear
        </a>
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
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">
                                    </th>
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

                                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                            <form class="inline" action="{{ route("$resource.destroy", $r->id) }}"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                                <div class="btn-group" role="group">
                                                    <a type="button"
                                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                                        href="{{ route("$resource.show", $r->id) }}">Ver</a>
                                                    <a type="button"
                                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                                        href="{{ route("$resource.edit", $r->id) }}">Editar</a>
                                                    <button
                                                        class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                                                        type="submit">Borrar</button>
                                                </div>
                                            </form>
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
