<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <h1 style="font-weight:bold">Bienvenido al Registro de Vacunacion Argentino</h1>
        <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email Address -->
                <div>
                    <x-label for="user" :value="__('Usuario')" />

                    <x-input id="user" class="block mt-1 w-full" type="text" name="user" :value="old('user')" required autofocus />
                </div>

                <!-- DNI -->
                <div>
                    <x-label for="dni" :value="__('DNI')" />

                    <x-input id="dni" class="block mt-1 w-full" type="number" name="dni" :value="old('dni')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Contraseña')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />
                </div>

                <!--Mostrar contraseña-->
                <div class="mt-4 form-check">
                    <label for="mostrar" class="inline-flex items-center">
                        <input 
                        onclick="var x = document.getElementById('password');
                        if (x.type === 'password') {
                            x.type = 'text';
                        } else {
                            x.type = 'password';
                        }"
                        id="mostrar" type="checkbox" 
                        class="form-check-input rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        name="mostrar">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Mostrar contraseña') }}</span>
                    </label>
                </div>

                <!-- Remember Me -->
                <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Recuerdame') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('¿Olvidaste tu contaseña?') }}
                        </a>
                    @endif

                    <x-button class="ml-3">
                        {{ __('Iniciar sesión') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>