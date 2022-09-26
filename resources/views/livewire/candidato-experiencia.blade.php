<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <label for="empresa[]" class="block text-sm font-medium mb-2 dark:text-white">Empresa</label>
    <input type="text" id="empresa[]" name="empresa[]" wire:bind="experiencia.empresa"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">

    <label for="puesto[]" class="block text-sm font-medium mb-2 dark:text-white">Puesto Ocupado</label>
    <input type="text" id="puesto[]" name="puesto[]" wire:bind="experiencia.puesto"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">


    <label for="desde[]" class="block text-sm font-medium mb-2 dark:text-white">Desde</label>
    <input type="date" id="desde[]" name="desde[]" wire:bind="experiencia.desde"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">

    <label for="hasta[]" class="block text-sm font-medium mb-2 dark:text-white">Hasta</label>
    <input type="date" id="hasta[]" name="hasta[]" wire:bind="experiencia.hasta"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">


    <label for="salario[]" class="block text-sm font-medium mb-2 dark:text-white">Salario</label>
    <input type="text" id="salario[]" name="salario[]" wire:bind="experiencia.salario"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">


    <button type="button" wire:click="eliminar"
        class="mx-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
        Eliminar
    </button>
</div>
