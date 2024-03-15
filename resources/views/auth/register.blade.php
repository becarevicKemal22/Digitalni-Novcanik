<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="flex items-center justify-center text-2xl font-semibold flex space-x-1">
            <h1>Napravi svoj </h1>
            <h1 class="text-accent"> profil</h1>
        </div>

        <!-- Username -->
        <div>
            <x-input-label for="username" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full text-background" type="text" name="username" :value="old('username')" required autofocus autocomplete="username" placeholder="npr. nur1213" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>

        <!-- Name -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Ime')"/>
            <x-text-input id="name" class="block mt-1 w-full text-background" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" placeholder="npr. Nur" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Surname -->
        <div class="mt-4">
            <x-input-label for="surname" :value="__('Prezime')" />
            <x-text-input id="surname" class="block mt-1 w-full text-background" type="text" name="surname" :value="old('surname')" required autofocus autocomplete="surname" placeholder="npr. Milišić"/>
            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
        </div>


        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')"/>
            <x-text-input id="email" class="block mt-1 w-full text-background" type="email" name="email" :value="old('email')" required autocomplete="username" placeholder="npr. nur.milisic@gmail.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Date of birth -->
        <div class="mt-4">
            <x-input-label for="birthday" :value="__('Datum rođenja')" />
            <input class="block mt-1 w-full text-background text-opacity-60" type="date" id="birthday" name="birthday">
            <x-input-error :messages="$errors->get('birthday')" class="mt-2 text-background" />
        </div>


        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Šifra')" />

            <x-text-input id="password" class="block mt-1 w-full text-background"
                            type="password"
                            name="password"
                            required autocomplete="new-password" placeholder="•••••••••" required />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Potvrdi šifru')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full text-background"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" placeholder="•••••••••" required/>

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <br>

        <br>
        <div class="flex items-center justify-center text-background">
            <x-primary-button class="flex items-center justify-center  w-4/5">
                {{ __('Registruj se') }}
            </x-primary-button>
        </div>
<br>

<div class="flex items-center justify-center">
    <a class="text-sm text-normal text-opacity-75 hover:text-accent rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
        {{ __('Već imaš profil?') }}

    </a>

    <button onclick="window.location.href='{{route('login')}}'"
        type="button"
        class="inline-block rounded bg-primary text-accent px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
        PRIJAVI SE
    </button>
    </form>
</x-guest-layout>
