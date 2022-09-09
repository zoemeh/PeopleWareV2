<x-auth.layout>
    <!-- component -->

    <body class="bg-white">

        <!-- Example -->
        <div class="flex min-h-screen">

            <!-- Container -->
            <div class="flex flex-row w-full">

                <!-- Sidebar -->
                <div class='hidden lg:flex flex-col justify-between bg-[#ffe85c] lg:p-8 xl:p-12 lg:max-w-sm xl:max-w-lg'>
                    <div class="flex items-center justify-start space-x-3">
                        <span class="bg-black rounded-full w-8 h-8"></span>
                        <a href="#" class="font-medium text-xl">PeopleWare</a>
                    </div>
                    <div class='space-y-5'>
                        <h1 class="lg:text-3xl xl:text-5xl xl:leading-snug font-extrabold">Descubre nuevas experiencias</h1>
                    </div>
                    <p class="font-medium">© 2022 PeopleWare S.R.L.</p>
                </div>

                <!-- Login -->
                <div class="flex flex-1 flex-col items-center justify-center px-10 relative">
                    <div class="flex lg:hidden justify-between items-center w-full py-4">
                        <div class="flex items-center justify-start space-x-3">
                            <span class="bg-black rounded-full w-6 h-6"></span>
                            <a href="#" class="font-medium text-lg">PeopleWare</a>
                        </div>
                    </div>
                    <!-- Login box -->
                    <div class="flex flex-1 flex-col  justify-center space-y-5 max-w-md">
                        <div class="flex flex-col space-y-2 text-center">
                            <h2 class="text-3xl md:text-4xl font-bold">Inicia Sesión</h2>
                            <p class="text-md md:text-xl">Entra al portal de PeopleWare</p>
                        </div>
                        <form method="POST" action="{{ route('login') }}">

                            <div class="flex flex-col max-w-md space-y-5">
                                @csrf
                                <div class="relative">
                                    <input id="email" type="email" name="email" id="email"
                                        class=" px-3 py-2 md:px-4 md:py-3 w-full border-2 border-black rounded-lg font-medium placeholder:font-normal @error('email') border-red-500 focus:border-red-500 focus:ring-red-500  @enderror"
                                        required autocomplete="email" autofocus placeholder="Email"
                                        aria-describedby="hs-validation-name-error-helper">
                                    @error('email')
                                        <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                            <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                                <div class="relative">

                                    <input id="password" type="password"
                                        class="w-full px-3 py-2 md:px-4 md:py-3 border-2 border-black rounded-lg font-medium placeholder:font-normal @error('password') border-red-500 focus:border-red-500 focus:ring-red-500  @enderror"
                                        name="password" required autocomplete="current-password" placeholder="Password">
                                    @error('password')
                                        <div class="absolute inset-y-0 right-0 flex items-center pointer-events-none pr-3">
                                            <svg class="h-5 w-5 text-red-500" width="16" height="16"
                                                fill="currentColor" viewBox="0 0 16 16" aria-hidden="true">
                                                <path
                                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                            </svg>
                                        </div>
                                    @enderror
                                </div>
                                <div class="flex">
                                    <input type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 pointer-events-none focus:ring-blue-500 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800"
                                        name="remember" id="remember"" {{ old('remember') ? 'checked' : '' }}>
                                    <label for="remember" class="text-sm text-gray-500 ml-3 dark:text-gray-400">
                                        {{ __('Recuerdame') }}</label>
                                </div>
                                <button type="submit"
                                    class="flex items-center justify-center flex-none px-3 py-2 md:px-4 md:py-3 border-2 rounded-lg font-medium border-black bg-black text-white">Login</button>
                            </div>
                        </form>
                    </div>

                    <!-- Footer -->
                    <div class="flex justify-center flex-col m-auto mb-16 text-center text-lg dark:text-slate-200 ">
                        <p class="font-bold mb-1">Hecho por <a href="#" class="underline dark:text-white">Eduardo
                                Cruz</a></p>
                        <p>BLA BLE BLU</p>

                    </div>

                </div>
            </div>

        </div>
</x-auth.layout>
