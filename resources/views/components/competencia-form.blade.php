        <form method="POST"
            action="{{ $competencia->id ? route('competencias.update', $competencia->id) : route('competencias.store') }}">
            @if ($competencia->id)
                @method('PUT')
            @endif
            @csrf
            <label for="descripcion" class="block text-sm font-medium mb-2 dark:text-white">Descripcion</label>
            <input type="text" id="descripcion" name="descripcion" value="{{ $competencia->descripcion }}"
                class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">

            <div class="flex mb-2">
                <input type="checkbox" id="activo" name="activo" @checked($competencia->activo)
                    class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800">
                <label for="activo" class="text-sm text-gray-500 ml-3 dark:text-gray-400">Estado</label>
            </div>
            <button type="submit"
                class="mb-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
                Guardar
            </button>
        </form>
