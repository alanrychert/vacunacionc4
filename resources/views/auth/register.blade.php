<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <h1 class="mt-3" style="font-weight:bold">Registro de usuario</h1>
        <div class="w-full sm:max-w-md mt-3 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div>
                    <x-label for="name" :value="__('Nombre')" />

                    <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-label for="last_name" :value="__('Apellido')" />

                    <x-input id="last_name" class="block mt-1 w-full" type="text" name="last_name" :value="old('last_name')" required autofocus />
                </div>

                <div class="mt-4">
                    <x-label for="dni" :value="__('DNI')" />

                    <x-input id="dni" class="block mt-1 w-full" type="text" name="dni" :value="old('dni')" required autofocus />
                </div>

                <!-- Email Address -->
                <div class="mt-4">
                    <x-label for="email" :value="__('Email')" />

                    <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>

                <div class="mt-4">
                    <x-label for="region" :value="__('Region Sanitaria')" />

                    <select class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option selected>Seleccionar</option>
                            <option value="1">Zona1</option>
                            <option value="2">Zona2</option>
                        </select>
                </div>

                <div class="mt-4">
                    <x-label for="provincia" :value="__('Provincia')" />

                    <select class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option selected>Seleccionar</option>
                            <option value="1">Zona1</option>
                            <option value="2">Zona2</option>
                        </select>
                </div>

                <div class="mt-4">
                    <x-label for="rol" :value="__('Rol')" />

                    <select class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option selected>Seleccionar</option>
                            <option value="1">Operativo</option>
                            <option value="2">Administrador</option>
                        </select>
                </div>

                <div class="mt-4">
                    <x-label for="user" :value="__('Usuario')" />

                    <x-input id="user" class="block mt-1 w-full" type="text" name="user" :value="old('user')" required autofocus />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-label for="password" :value="__('Contraseña')" />

                    <x-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />
                </div>

                <!-- Confirm Password -->
                <div class="mt-4">
                    <x-label for="password_confirmation" :value="__('Confirmar contraseña')" />

                    <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required />
                </div>

                <!--Mostrar password-->
                <div class="mt-4 form-check">
                    <label for="mostrar" class="inline-flex items-center">
                        <input 
                        onclick="var x = document.getElementById('password');
                        var y = document.getElementById('password_confirmation');
                        if (x.type === 'password') {
                            x.type = 'text';
                            y.type = 'text';
                        } else {
                            x.type = 'password';
                            y.type = 'password';
                        }"
                        id="mostrar" type="checkbox" 
                        class="form-check-input rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                        name="mostrar">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Mostrar contraseña') }}</span>
                    </label>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('¿Ya esta registrado?') }}
                    </a>

                    <x-button class="ml-4">
                        {{ __('Registrar') }}
                    </x-button>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
