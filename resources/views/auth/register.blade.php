<x-guest-layout>
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-gray-100">
        <h1 class="mt-3" style="font-weight:bold">Registro de usuario</h1>
        <div class="w-full sm:max-w-md mt-3 px-6 py-4 bg-white shadow-md overflow-hidden sm:rounded-lg">

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            
            <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
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
                    <x-label for="province" :value="__('Provincia')" />

                    <select id ="province" name="province" class="form-select block appearance-none mt-1 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option selected>Seleccionar</option>
                            @foreach ($provinces as $province)
                            <option  value="{{$province->name}}">{{ $province->name }}</option>
                            @endforeach
                        </select>
                </div>

                <div class="mt-4">
                    <x-label for="region" :value="__('Region Sanitaria')" />

                    <x-input id="region" class="block mt-1 w-full" type="text" name="region" :value="old('region')" required />
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

                    <x-button class="ml-4">
                        {{ __('Registrar') }}
                    </x-button>

                    <a class="'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 ml-4" href="{{ route('index')}}">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</x-guest-layout>
