++                                                                                                                                                          <x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="flex items-center justify-center text-2xl font-semibold">
            <h1>Prijavi se na svoj profil</h1>
        </div>

        <br>

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full text-background" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" placeholder="npr. nur.milisic@gmail.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>



        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Šifra')" />

            <x-text-input id="password" class="block mt-1 w-full text-background" type="password" name="password" required
                autocomplete="current-password" placeholder="•••••••••" required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>


        <div class="flex items-center justify-end mt-4">
            @if (Route::has('password.request'))
<a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                    {{ __('Forgot your password?') }}
                </a>
@endif

            -->
        <br>
        <div class="flex items-center justify-center">
            <x-primary-button class="flex items-center justify-center  w-4/5">
                {{ __('Prijavi se') }}
            </x-primary-button>
        </div>
        <br>
        <div class="flex items-center justify-center">
            <a class="text-sm text-normal text-opacity-75 hover:text-accent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                href="{{ route('login') }}">
                {{ __('Nemaš profil?') }}

            </a>
            <button onclick="window.location.href='{{ route('register') }}'" type="button"
                class="inline-block rounded bg-primary text-accent px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
                REGISTRUJ SE
            </button>

            <!--<x-primary-button class="ml-20 place-content-center place-items-center">
                {{ __('REGISTRUJ SE') }}
            </x-primary-button>
        -->

        </div>
        </div>
    </form>
</x-guest-layout>
