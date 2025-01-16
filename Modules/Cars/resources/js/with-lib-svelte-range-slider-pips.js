import RangeSlider from "../../../../node_modules/svelte-range-slider-pips/dist/svelte-range-slider-pips.mjs";

//? currency-range-slider
if (document.querySelector("#currency-range-slider")) {

	var CurrencyRangeSlider = new RangeSlider({
		target: document.getElementById("currency-range-slider"),
		props: {
			min: window.pricesMin,
			max: window.pricesMax,
			values: [window.pricesMinCurrent, window.pricesMaxCurrent],
			step: 1,
			range: true,
			float: true,
			suffix: "",
			pushy: false,
			pips: false,
		}
	});

	let CurrencyFirst = document.querySelector(".currency-first");
	let CurrencyLast = document.querySelector(".currency-last");

	// Логіка зміни значень інпутів та повзунків
	CurrencyRangeSlider.$on('change', function (e) {
		CurrencyFirst.value = e.detail.values[0];
		CurrencyLast.value = e.detail.values[1];
	});

	// change input value
	CurrencyFirst.addEventListener("change", (e) => {
		CurrencyRangeSlider.$set({ values: [CurrencyFirst.value, CurrencyLast.value] });
	});

	CurrencyLast.addEventListener("change", (e) => {
		CurrencyRangeSlider.$set({ values: [CurrencyFirst.value, CurrencyLast.value] });
	});

}