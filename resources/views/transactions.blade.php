<x-app-layout>
    <div class="flex items-center justify-center text-2xl font-semibold">
        <h1>Vaše transackije</h1>
    </div>
    <br>

    @foreach($transactions as $transaction)
{{--        Znaci trebace ti ovaj foreach ovako koji se izvrsi za svaku transakciju korisnika
            One ti budu spremljene u ovom $transaction
            Onda ti mozes unutar ovog foreach da ustvari napravis onu karticu sa imenom, tipom i dugmadima onim i onda ce on to ubaciti koliko god puta treba
            Sve ovo sto izvlacis iz $transaction i hoces da bude razlicito za svaku transackiju, dakle dinamicki podaci sa bekenda idu u ove {{ }} i onda u tome pristupas transakciji ili cemu vec
            --}}
        <h1>{{$transaction->name}}</h1>
    @endforeach
</x-app-layout>
