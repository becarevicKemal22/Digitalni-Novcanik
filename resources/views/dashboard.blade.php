<x-app-layout>
  <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('digitalni novčanik') }}
        </h2>
    </x-slot>

    <div class="-py-12" id="glavni">
        <div class="max-w-7xl w-fit mx-auto sm:px-6 lg:px-8">
            <div class="relative overflow-hidden">
                <img src="{{asset('wave-haikei.png')}}" alt="" class="w-[470px]">
                <h1 class="p-4 text-5xl text-normal absolute inset-x-4 inset-y-56">Zdravo, {{$user->name}}!</h1> <br>
            </div>

            <div class="py-12">
                <h1 class="text-normal text-3xl">Trenutno stanje: <span class="text-accent font-bold">{{$user->balance}} {{$valuta}} </span></h1>
                <br>
                <h1 class="text-normal text-opacity-75 text-xl">Prilivi:</h1>
                <div class="relative">
                   <!-- <input type="text" id="disabled_filled" class="text-zelena bg-siva hover:bg-gradient-to-bl block rounded-full px-2.5 pb-2.5 pt-5 w-full text-sm " placeholder=" " disabled />
                    <label for="disabled_filled" class="absolute text-4xl text-zelena duration-300 transform -translate-y-4 scale-75 top-5 ml-3 z-10 origin-[0] start-2.5 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{$prilivi}} BAM</label> -->
                <h1 class="text-zelena text-4xl ml-14" >{{$prilivi}} {{$valuta}}</h1>
                </div>
    <br>
                <h1 class="text-normal text-opacity-75 text-xl font-light">Odlivi:</h1>
                <div class="relative">
                    <h1 class="text-crvena text-4xl ml-14">{{$odlivi}} {{$valuta}}</h1>
                </div>
                <div class="mt-12">
                    <canvas id="myChart" style="width:100%;max-width:450px"></canvas>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

<script defer>

    const prilivi_data = {!! json_encode($prilivi_data) !!};
    const odlivi_data = {!! json_encode($odlivi_data) !!};

    const xValues = [];
    for(let i = 1; i <= prilivi_data.length; i++){
        xValues[i - 1] = i;
    }

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                data: prilivi_data,
                borderColor: "#7555D3",
                fill: false
            },{
                data: odlivi_data,
                borderColor: "#7e65cb",
                fill: false
            }]
        },
        options: {
            legend: {display: false}
        }
    });
</script>
