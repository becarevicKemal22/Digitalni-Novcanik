<x-app-layout>
    <div class="items-center justify-center text-2xl font-semibold text-normal">
        <br>
        <h1 class="flex items-center justify-center whitespace-pre-line text-normal font-xl">digitalni novčanik</h1>
        <br>
        <h1 class="text-5xl text-normal flex items-center justify-center font-xl">Ciklične transakcije</h1>
        <br>
    </div>
    <br>

    <div class="w-1/2 xl:w-1/3 mx-auto">
        @foreach($transactions as $transaction)
            <div
                class="mb-4 cursor-default rounded-2xl px-10 py-4 flex justify-between min-w-full items-center bg-siva shadow-lg hover:normal">
                <div class="flex-col justify-between">
                    <div class="flex gap-4 items-center">
                        <h3 class="text-normal group-hover:text-white text-2xl font-semibold">{{$transaction->name}}</h3>
                        <h4 class="text-gray-300">{{$transaction->date}}</h4>
                    </div>
                    <div class="category mt-2 px-5 py-1.5 rounded-full max-w-fit"
                         style="background-color: {{$transaction->category->boja}}">
                        <h4>{{$transaction->category->ime}}</h4>
                    </div>

                </div>
                <div class="flex gap-3 items-center">
                    @if($transaction->inflow)
                        <p class="text-zelena group-hover:text-background text-2xl">{{$transaction->amount}} {{$currency}}</p>
                    @else
                        <p class="text-crvena group-hover:text-background text-2xl">
                            -{{$transaction->amount}} {{$currency}}</p>
                    @endif
                    <form method="POST" action="/transaction-delete/{{$transaction->id}}">
                        @csrf
                        {{ method_field('DELETE')  }}
                        <button
                            class="rounded-full text-white bg-accent p-2 w-12 aspect-square flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-5 fill-white">
                                <path
                                    d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/>
                            </svg>
                        </button>
                    </form>
                    <button id="showChangeIntervalForm"
                            class="rounded-full text-white bg-accent p-2 w-12 aspect-square">
                        <span class="text-xl">[ ]</span>
                    </button>
                    <button class="rounded-full text-white bg-accent p-2 w-12 aspect-square">
                        <span class="text-xl">[ ]</span>
                    </button>

                </div>
                @endforeach
                @if(count($transactions) == 0)
                    <div class="w-full flex justify-center">
                        <h2 class="text-white text-xl">Trenutno nemate spašenih cikličnih transakcija</h2>
                    </div>
                @endif
            </div>
            <br>
    </div>
    <div id="modalBackground"></div>
    <div id="changeIntervalForm" class="p-4 text-white rounded-lg bg-siva">
        <form action="{{route("transaction.modify", $transaction->id)}}">
            {{method_field('PATCH')}}
            <label for="interval">Interval ponavljanja</label>
            <select class="text-background" name="interval" id="interval">
                <option value="Single">Jednokratna</option>
                <option value="Daily">Dnevna</option>
                <option value="Monthly">Mjesečna</option>
                <option value="Yearly">Godišnja</option>
            </select>
        </form>
    </div>
</x-app-layout>

<script>
    function getRGB(c) {
        return parseInt(c, 16) || c
    }

    function getsRGB(c) {
        return getRGB(c) / 255 <= 0.03928
            ? getRGB(c) / 255 / 12.92
            : Math.pow((getRGB(c) / 255 + 0.055) / 1.055, 2.4)
    }

    function getLuminance(hexColor) {
        return (
            0.2126 * getsRGB(hexColor.substr(1, 2)) +
            0.7152 * getsRGB(hexColor.substr(3, 2)) +
            0.0722 * getsRGB(hexColor.substr(-2))
        )
    }

    function getContrast(f, b) {
        const L1 = getLuminance(f)
        const L2 = getLuminance(b)
        return (Math.max(L1, L2) + 0.05) / (Math.min(L1, L2) + 0.05)
    }

    function getTextColor(bgColor) {
        const whiteContrast = getContrast(bgColor, '#ffffff')
        const blackContrast = getContrast(bgColor, '#000000')

        return whiteContrast > blackContrast ? '#ffffff' : '#000000'
    }

    const rgb2hex = (rgb) => `#${rgb.match(/^rgb\((\d+),\s*(\d+),\s*(\d+)\)$/).slice(1).map(n => parseInt(n, 10).toString(16).padStart(2, '0')).join('')}`

    const elements = [...document.getElementsByClassName("category")]
    const colors = elements.map((el) => rgb2hex(window.getComputedStyle(el, null).backgroundColor));
    colors.forEach((color, index) => {
        elements[index].firstElementChild.style.color = getTextColor(color);
    });


    /*
    FORM MODAL SHOWING LOGIC
     */

    const showChangeIntervalFormButton = document.getElementById('showChangeIntervalForm');
    const changeIntervalForm = document.getElementById('changeIntervalForm');
    showChangeIntervalFormButton.addEventListener('click', () => {
        changeIntervalForm.classList.toggle('hidden');
    })
</script>

<style>
    #modalBackground {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: black;
        opacity: 40%;
    }
    #changeIntervalForm {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translateX(-50%) translateY(-50%);
    }
</style>
