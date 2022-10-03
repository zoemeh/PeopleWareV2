<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <label for="empresa[]" class="block text-sm font-medium mb-2 dark:text-white">Empresa</label>
    <input type="text" id="empresa[]" name="empresa[]" wire:model="experiencia.empresa"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
    @error('experiencia.empresa')
        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
    @enderror
    <label for="puesto[]" class="block text-sm font-medium mb-2 dark:text-white">Puesto Ocupado</label>
    <input type="text" id="puesto[]" name="puesto[]" wire:model="experiencia.puesto"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">

    @error('experiencia.puesto')
        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
    @enderror
    <label for="desde[]" class="block text-sm font-medium mb-2 dark:text-white">Desde</label>
    <input type="date" id="desde[]" name="desde[]" wire:model="experiencia.desde"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
    @error('experiencia.desde')
        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
    @enderror

    <label for="hasta[]" class="block text-sm font-medium mb-2 dark:text-white">Hasta</label>
    <input type="date" id="hasta[]" name="hasta[]" wire:model="experiencia.hasta"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
    @error('experiencia.hasta')
        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
    @enderror
    <label for="salario[]" class="block text-sm font-medium mb-2 dark:text-white">Salario</label>
    <input id="salario[]" name="salario[]" wire:model="experiencia.salario" type="number" step="0.1"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">

    @error('experiencia.salario')
        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
    @enderror
    <button type="button" wire:click="eliminar"
        class="mx-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
        Eliminar
    </button>
</div>
