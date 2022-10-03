<div
    class="flex flex-col bg-white border shadow-sm rounded-xl dark:bg-gray-800 dark:border-gray-700 dark:shadow-slate-700/[.7]">
    <div class="bg-gray-100 border-b rounded-t-xl py-3 px-4 md:py-4 md:px-5 dark:bg-gray-800 dark:border-gray-700">
        <p class="mt-1 text-sm text-gray-500 dark:text-gray-500">
            Reporte
        </p>
    </div>
    <div class="p-4 md:p-5">
        <h3 class="text-lg font-bold text-gray-800 dark:text-white">
            Reporte Nuevos Ingresos
        </h3>
        <label for="desde" class="block text-sm font-medium mb-2 dark:text-white">Desde
        </label>
        <input type="date" id="desde" name="desde" wire:model="desde"
            class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
        @error('desde')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
        @enderror
        <label for="hasta" class="block text-sm font-medium mb-2 dark:text-white">Hasta
        </label>
        <input type="date" id="hasta" name="desde" wire:model="hasta"
            class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
        @error('hasta')
            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
        @enderror
        <button type="button" wire:click="generar"
            class="mb-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-blue-500 text-white hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
            Generar Reporte
        </button>
    </div>
</div>
