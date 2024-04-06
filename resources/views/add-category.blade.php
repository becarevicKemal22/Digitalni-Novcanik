<x-app-layout>
    <br>
    <h1 class="flex items-center justify-center whitespace-pre-line text-normal font-3xl">digitalni novčanik</h1>
    <br>
    <div class="text-5xl text-normal flex items-center justify-center ">
        <h1>Napravi transakciju</h1>
    </div>
    <br>
    <form method="POST" action="{{ route('category.add') }}">
        @csrf

        <div class="text-normal group flex justify-center rounded-full p-2">
            <div>
                <!-- Name -->
                <div class="mt-4">
                    <x-input-label for="name" :value="__('Naziv kategorije')"/>
                    <x-text-input id="name" class="block mt-1 text-background w-96" type="text" name="name"
                                  :value="old('name')" required autofocus autocomplete="name"
                                  placeholder="npr. Hrana"/>
                    <x-input-error :messages="$errors->get('name')" class="mt-2"/>
                </div>
                <div class="mt-4 mb-4 flex items-center justify-between">
                    <label for="color">Boja kategorije</label>
                    <input type="color" name="color" id="color">
                </div>
                <div class="flex justify-around mt-2">
                    <x-primary-button class="justify-center w-44">
                        Spremi
                    </x-primary-button>
                    <x-danger-button>
                        <a class="w-36" href="{{route('transactions')}}">
                            Otkaži
                        </a>
                    </x-danger-button>
                </div>

            </div>

        </div>

    </form>
</x-app-layout>
