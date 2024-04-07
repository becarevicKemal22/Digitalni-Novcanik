<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')"/>

    <form method="POST" action="{{ route('setCurrency') }}">
        @csrf

        <div class="flex items-center justify-center text-2xl font-semibold">
            <h1>Vaše trenutno stanje</h1>
        </div>

        <br>

        <!-- Balance -->
        <div>
            <x-input-label for="balance" :value="__('Trenutno stanje u novčaniku')"/>
            <x-text-input id="balance" class="block mt-1 w-full text-background" type="number" name="balance"
                          :value="old('balance')" required
                          autofocus autocomplete="balance"/>
            <x-input-error :messages="$errors->get('balance')" class="mt-2"/>
        </div>


        <!-- Currency -->
        <div class="mt-4">
            <x-input-label for="currency" :value="__('Valuta koju želite koristiti')"/>

            <select class="text-background rounded-md mt-1" name="currency" id="currency">
                <option value="BAM">BAM</option>
                <option value="USD">USD</option>
                <option value="EUR">EUR</option>
                <option value="RSD">RSD</option>
            </select>

            <x-input-error :messages="$errors->get('currency')" class="mt-2"/>
        </div>

        <br>
        <div class="flex items-center justify-center">
            <x-primary-button class="flex items-center justify-center  w-4/5">
                {{ __('Završi registraciju') }}
            </x-primary-button>
        </div>
        <br>
    </form>
</x-guest-layout>
