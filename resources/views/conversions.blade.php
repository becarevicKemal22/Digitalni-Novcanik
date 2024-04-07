<x-app-layout>
    <div class="px-24 py-12 flex flex-col items-center">
        <h1 class="text-5xl text-normal flex items-center justify-center font-xl">Konverzije valuta</h1>

        <div class="py-12 flex flex-col gap-6">
            <div class="bg-white rounded-full overflow-hidden">
                <select class="" name="baseCurrency" id="baseCurrency">
                    <option value="BAM">BAM</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="RSD">RSD</option>
                </select>
                <input class="" type="number" name="baseCurrencyAmount" id="baseCurrencyAmount" value="0" min="0">
            </div>
            <div class="bg-white rounded-full overflow-hidden">
                <select class="" name="targetCurrency" id="targetCurrency">
                    <option value="BAM">BAM</option>
                    <option value="USD">USD</option>
                    <option value="EUR">EUR</option>
                    <option value="RSD">RSD</option>
                </select>
                <input class="" type="number" name="targetCurrencyAmount" id="targetCurrencyAmount" value="0" min="0">
            </div>
            <div>
                <h3 class="text-normal text-xl pb-2">Kurs Valute:</h3>
                <p class="text-normal" id="kursDisplay"></p>
            </div>
            <input class="bg-accent p-2 text-lg text-white rounded-lg" type="button" value="Konvertuj"
                   id="convert">

        </div>
    </div>
</x-app-layout>

<style>
    #convert {
        cursor: pointer;
    }
</style>

<script>

    const getCurrencies = () => {
        const base = document.getElementById('baseCurrency');
        const target = document.getElementById('targetCurrency');
        return [base.value, target.value];
    }

    const getValue = () => {
        const amount = document.getElementById('baseCurrencyAmount');
        return amount.value;
    }

    const fetchRate = async (base, target) => {
        const url = "https://api.currencyapi.com/v3/latest?" + new URLSearchParams({
            apikey: "cur_live_n2gD3XFlKdUxbQZ8xPEv3xeqjvSrQeULFlTkjWke",
            currencies: target,
            base_currency: base,
        }).toString();
        const result = await fetch(url).then(data => {
            return data.json()
        });
        return result.data[target].value
    }

    const kursDisplay = document.getElementById('kursDisplay');
    kursDisplay.textContent = "1 BAM = 1 BAM"

    const convertButton = document.getElementById('convert');
    convertButton.addEventListener("click", async () => {
        convertButton.value = "Učitavanje...";
        const currencies = getCurrencies();
        if (currencies[0] == currencies[1]) {
            return;
        }
        const value = getValue();
        const rate = await fetchRate(currencies[0], currencies[1]);
        const newValue = value * rate;
        const outputEl = document.getElementById('targetCurrencyAmount');
        outputEl.value = newValue;

        const kursString = "1 " + currencies[0] + " = " + rate + " " + currencies[1];
        kursDisplay.textContent = kursString;
        convertButton.value = "Konvertuj";
    })

</script>
