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
            <x-text-input id="amount" name="amount" class="block mt-1 w-full text-background" type="number" amount="amount"
                          :value="old('amount')" required autofocus autocomplete="amount"/>
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

        <div class="mt-4">
            <label for="interval">Interval ponavljanja</label>
            <select name="interval" id="interval">
                <option value="Single">Jednokratna</option>
                <option value="Daily">Dnevna</option>
                <option value="Monthly">Mjesečna</option>
                <option value="Yearly">Godišnja</option>
            </select>
        </div>

        <div class="mt-4">
            <label for="inflow">Tip transakcije</label>
            <select name="inflow" id="inflow">
                <option value="inflow">Priliv</option>
                <option value="outflow">Odliv</option>
            </select>
        </div>
        <div class="mt-4">
            <label for="date">Datum</label>
            <input type="date" name="date" id="date">
        </div>
        <x-primary-button>
            Spremi
        </x-primary-button>
        <x-danger-button>
            <a href="{{route('transactions')}}">
                Otkaži
            </a>
        </x-danger-button>

    </form>
</x-app-layout>
