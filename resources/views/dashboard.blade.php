<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
{{--            Evo ti primjer kako se pristupa ovim poljima sto su ti proslijedjena za dashboard--}}
            <h1>Cao, {{$user->name}}</h1>
            <h1>Balans: {{$user->balance}}</h1>
            <h1>Prilivi: {{$prilivi}}</h1>
            <h1>Odlivi: {{$odlivi}}</h1>
        </div>
    </div>
</x-app-layout>
