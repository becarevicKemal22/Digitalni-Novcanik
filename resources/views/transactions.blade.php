<x-app-layout>
    <div class="items-center justify-center text-2xl font-semibold text-normal">
        <br>
        <h1 class="flex items-center justify-center whitespace-pre-line text-normal font-xl">digitalni novčanik</h1>
       <br>
        <h1 class="text-5xl text-normal flex items-center justify-center font-xl">Transakcije</h1>
        <br>
    </div>
    <br>

    @foreach($transactions as $transaction)
{{--        Znaci trebace ti ovaj foreach ovako koji se izvrsi za svaku transakciju korisnika
            One ti budu spremljene u ovom $transaction
            Onda ti mozes unutar ovog foreach da ustvari napravis onu karticu sa imenom, tipom i dugmadima onim i onda ce on to ubaciti koliko god puta treba
            Sve ovo sto izvlacis iz $transaction i hoces da bude razlicito za svaku transackiju, dakle dinamicki podaci sa bekenda idu u ove {{ }} i onda u tome pristupas transakciji ili cemu vec
            --}}
     <!--       <h1 class="text-normal">{{$transaction->name}}</h1> -->

     <div>
        <a href="#" class="group block mx-80 rounded-full p-2 bg-siva shadow-lg space-y-2 hover:bg-accent hover:normal">
            <div class="flex space-x-40 whitespace-pre-line">
              <svg class="h-6 w-6 stroke-accent group-hover:stroke-white"><!-- ... --></svg>
              <h3 class="text-normal group-hover:text-white text-2xl font-semibold">{{$transaction->name}}
            <span class="font-light text-xl text-normal group-hover:text-white">kategorija transakcije</span>
            </h3>
              <p class="text-crvena group-hover:text-background text-2xl">-{{$transaction->amount}} BAM</p>
  <!--            <h3 class="text-normal group-hover:text-white text-2xl font-light">kategorija transakcije</h3> -->
            </div>
        </a>
    </div>
<br>

    @endforeach
</x-app-layout>
