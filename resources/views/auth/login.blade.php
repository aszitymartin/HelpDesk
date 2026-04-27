<x-guest-layout>

    <section class="flex flex-col bg-[#1a1e2e] gap-4 p-6 m-auto w-[50rem] border-soft box-shadow relative">
        
        <div class="flex flex-row items-center justify-between w-full">
            <img id="modalLogo" class="modalLogo" src="{{ asset('assets/img/icon.png') }}">
            <span class="text-gray-400 font-medium text-xs ml-auto uppercase">Bejelentkezés</span>
        </div>

        <section class="formcarry-container w-full modalContent mt-12 m-auto padding-2">

            <!-- Session Status -->
            <x-auth-session-status class="mb-5 w-full" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="mx-auto w-full">
                @csrf

                <!-- Email Address -->
                <div class="mb-5 w-full">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full innerp" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-5 w-full">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full innerp"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Remember Me -->
                {{-- <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800" name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Remember me') }}</span>
                    </label>
                </div> --}}

                <div class="flex items-center justify-end mt-4">
                    {{-- @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif --}}

                    <button type="submit" class="text-white button w-full">{{ __('Log in') }}</button>

                </div>
            </form>

        </section>

    </section>

</x-guest-layout>
