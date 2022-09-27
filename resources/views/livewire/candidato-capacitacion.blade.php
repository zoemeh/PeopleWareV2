<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <label for="descripcion[]" class="block text-sm font-medium mb-2 dark:text-white">Descripcion</label>
    <input type="text" id="empresa[]" name="empresa[]" wire:model="capacitacion.descripcion"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
    @error('capacitacion.descripcion')
        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
    @enderror
    <label for="nivel[]" class="block text-sm font-medium mb-2 dark:text-white">Nivel</label>
    <select id="nivel[]" wire:model="capacitacion.nivel"
        class="mb-4 py-3 px-4 pr-9 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
        @foreach (['grado', 'postgrado', 'doctorado', 'tecnico', 'gestion'] as $nivel)
            <option value="{{ $nivel }}">{{ str($nivel)->headline() }}</option>
        @endforeach
    </select>
    @error('capacitacion.nivel')
        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
    @enderror
    <label for="institucion[]" class="block text-sm font-medium mb-2 dark:text-white">Institucion</label>
    <input type="text" id="institucion[]" name="puesto[]" wire:model="capacitacion.institucion"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
    @error('capacitacion.institucion')
        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
    @enderror
    <label for="desde[]" class="block text-sm font-medium mb-2 dark:text-white">Desde</label>
    <input type="date" id="desde[]" name="desde[]" wire:model="capacitacion.desde"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
    @error('capacitacion.desde')
        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
    @enderror
    <label for="hasta[]" class="block text-sm font-medium mb-2 dark:text-white">Hasta</label>
    <input type="date" id="hasta[]" name="hasta[]" wire:model="capacitacion.hasta"
        class="mb-2 py-3 px-4 block w-full border-gray-200 rounded-md text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400">
    @error('capacitacion.hasta')
        <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
    @enderror
    <button type="button" wire:click="eliminar"
        class="mx-2 py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-red-500 text-white hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800">
        Eliminar
    </button>
</div>
