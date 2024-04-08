<x-app-layout>
    <div class="flex flex-col items-center justify-center text-2xl font-semibold text-normal">
        <br>
        <h1 class="flex items-center justify-center whitespace-pre-line text-normal font-xl">digitalni novčanik</h1>
        <br>
        <h1 class="text-5xl text-normal flex items-center justify-center font-xl">Transakcije</h1>
        <a class="bg-siva hover:bg-accent text-white p-3 rounded-lg text-base mt-8 -mb-6" href="{{route('cyclicalTransactions')}}">
            Pregled cikličnih transakcija
        </a>
        <br>
    </div>
    <br>

    <div class="w-1/2 xl:w-1/3 mx-auto">
        <div class="mb-6 flex flex-col justify-center items-center">
            <h2 class="text-3xl text-gray-100">Filteri</h2>
            <form action="">
                <div class="flex flex-col gap-2 text-white">
                    <div class="mt-4">
                        <label for="date" class="text-white mr-3">Datum transakcije</label>
                        <input class="text-background rounded-md" type="date" name="date" id="date">
                    </div>
                    <div class="mt-4 flex justify-between items-center">
                        <label for="category">Kategorija transakcije</label>
                        <select class="text-background rounded-md" name="category" id="category">
                            <option value="0">Sve</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->ime}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mt-4 flex justify-around gap-2">
                    <x-primary-button class="justify-center">
                        Traži
                    </x-primary-button>
                    <x-danger-button>
                        <a class="" href="{{route('transactions')}}">
                            Poništi
                        </a>
                    </x-danger-button>
                </div>
            </form>
        </div>
        @foreach($transactions as $transaction)
            <div
                class="mb-4 cursor-default rounded-2xl px-10 py-4 flex justify-between min-w-full items-center bg-siva shadow-lg hover:bg-accent hover:normal">
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
                <div class="flex gap-4 items-center">
                    @if($transaction->inflow)
                        <p class="text-zelena group-hover:text-background text-2xl">{{$transaction->amount}} {{$currency}}</p>
                    @else
                        <p class="text-crvena group-hover:text-background text-2xl">-{{$transaction->amount}} {{$currency}}</p>
                    @endif
                    <form method="POST" action="/transaction-delete/{{$transaction->id}}">
                        @csrf
                        {{ method_field('DELETE')  }}
                        <button class="rounded-full text-white mt-1">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="w-6 fill-white"><path d="M135.2 17.7C140.6 6.8 151.7 0 163.8 0H284.2c12.1 0 23.2 6.8 28.6 17.7L320 32h96c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 96 0 81.7 0 64S14.3 32 32 32h96l7.2-14.3zM32 128H416V448c0 35.3-28.7 64-64 64H96c-35.3 0-64-28.7-64-64V128zm96 64c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16zm96 0c-8.8 0-16 7.2-16 16V432c0 8.8 7.2 16 16 16s16-7.2 16-16V208c0-8.8-7.2-16-16-16z"/></svg>
                        </button>
                    </form>
                </div>

            </div>
        @endforeach
        @if(count($transactions) == 0)
            <div class="w-full flex justify-center">
                <h2 class="text-white text-xl">Trenutno nemate spašenih transakcija</h2>
            </div>
        @endif
    </div>
    <br>

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
    })
</script>
