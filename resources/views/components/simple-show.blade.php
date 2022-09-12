<div
    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7] m-4">
    <div class="p-4 md:p-5">
        <h3 class="text-lg font-bold text-gray-800 dark:text-white">
            {{ $record->descripcion }}
        </h3>
        <p class="mt-1 text-gray-800 dark:text-gray-400">
            ID: {{ $record->id }}
        </p>
        <p class="mt-1 text-gray-800 dark:text-gray-400">
            Creado en: {{ $record->created_at }}

        </p>
        <p class="mt-1 text-gray-800 dark:text-gray-400">
            Actualizado en: {{ $record->updated_at }}s
        </p>
        <form class="inline" action="{{ route("$resource.destroy", $record->id) }}" method="post">
            @csrf
            @method('DELETE')
            <div class="btn-group mt-2" role="group">
                <a type="button"
                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                    href="{{ route("$resource.edit", $record->id) }}">Editar</a>
                <button
                    class="py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800"
                    type="submit">Borrar</button>
            </div>
        </form>
    </div>
</div>
