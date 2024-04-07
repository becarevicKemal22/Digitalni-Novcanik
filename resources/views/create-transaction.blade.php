<x-app-layout>
    <br>
    <h1 class="flex items-center justify-center whitespace-pre-line text-normal font-3xl">digitalni novčanik</h1>
    <br>
    <div class="text-5xl text-normal flex items-center justify-center ">
        <h1>Dodaj kategoriju</h1>
    </div>
    <br>
    <form method="POST" action="{{ route('transaction.store') }}">
        @csrf
            <div class="text-normal group flex justify-center rounded-full p-2">
                <div>
                    <!-- Name -->
                    <div class="mt-4">
                        <x-input-label for="name" :value="__('Ime Transakcije')"/>
                        <x-text-input id="name" class="block mt-1 text-background w-96" type="text" name="name"
                                      :value="old('name')" required autofocus autocomplete="name"
                                      placeholder="npr. Plata"/>
                        <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                    </div>
                    <!-- Iznos -->
                    <div class="mt-4">
                        <x-input-label for="amount" :value="__('Iznos')"/>
                        <x-text-input id="amount" name="amount" class="block mt-1 w-96 text-background" type="number"
                                      amount="amount"
                                      :value="old('amount')" required autofocus autocomplete="amount" min="0.00" step="1"/>
                        <x-input-error :messages="$errors->get('amount')" class="mt-2"/>
                    </div>

                    <div class="mt-4 flex justify-between items-center">
                        <label for="category">Kategorija</label>
                        <div class="flex gap-2 items-center">
                            <a href="{{route("category.add")}}" class="w-8 h-8 flex items-center justify-center rounded-full bg-accent">
                                <span class="text-xl">+</span>
                            </a>
                            <select class="text-background" name="category" id="category">
                            @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->ime}}</option>
                                @endforeach
                        </select>
                        </div>

                    </div>

                    <div class="mt-4 flex justify-between items-center ">
                        <label for="interval">Interval ponavljanja</label>
                        <select class="text-background" name="interval" id="interval">
                            <option value="Single">Jednokratna</option>
                            <option value="Daily">Dnevna</option>
                            <option value="Monthly">Mjesečna</option>
                            <option value="Yearly">Godišnja</option>
                        </select>
                    </div>

                    <div class="mt-4 flex justify-between items-center">
                        <label for="inflow">Tip transakcije</label>
                        <select class="text-background" name="inflow" id="inflow">
                            <option value="inflow">Priliv</option>
                            <option value="outflow">Odliv</option>
                        </select>
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <label for="date">Datum</label>
                        <input class="text-background" type="date" name="date" id="date" value ="<?php echo date('Y-m-d') ?>">
                    </div>
                    <br>
                    <x-primary-button class="justify-center w-44">
                        Spremi
                    </x-primary-button>
                    <x-danger-button>
                        <a class="w-44" href="{{route('transactions')}}">
                            Otkaži
                        </a>
                    </x-danger-button>
                </div>
            </div>
    </form>
</x-app-layout>
