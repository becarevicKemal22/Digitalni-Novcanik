<x-app-layout>
    <div class="flex items-center justify-center text-2xl font-semibold">
        <h1>Napravi transakciju</h1>
    </div>
    <br>
    <form method="POST" action="{{ route('transaction.store') }}">
        @csrf


        <!-- Name Address -->
        <div class="mt-4">
            <x-input-label for="name" :value="__('Ime Transakcije')"/>
            <x-text-input id="name" class="block mt-1 w-full text-background" type="text" name="name"
                          :value="old('name')" required autofocus autocomplete="name" placeholder="npr. Plata"/>
            <x-input-error :messages="$errors->get('name')" class="mt-2"/>
        </div>
        <!-- Iznos -->
        <div class="mt-4">
            <x-input-label for="amount" :value="__('Iznos')"/>
            <x-text-input id="amount" class="block mt-1 w-full text-background" type="text" amount="amount"
                          :value="old('amount')" required autofocus autocomplete="amount" placeholder="npr. Plata"/>
            <x-input-error :messages="$errors->get('amount')" class="mt-2"/>
        </div>

        <div class="mt-4">
            <label for="category">Kategorija</label>
            <select name="category" id="category">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->ime}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit"
                class="inline-block rounded bg-primary text-accent px-6 pb-2 pt-2.5 text-xs font-medium uppercase leading-normal shadow-primary-3 transition duration-150 ease-in-out hover:bg-primary-accent-300 hover:shadow-primary-2 focus:bg-primary-accent-300 focus:shadow-primary-2 focus:outline-none focus:ring-0 active:bg-primary-600 active:shadow-primary-2 motion-reduce:transition-none dark:shadow-black/30 dark:hover:shadow-dark-strong dark:focus:shadow-dark-strong dark:active:shadow-dark-strong">
            REGISTRUJ SE
        </button>
    </form>
</x-app-layout>
