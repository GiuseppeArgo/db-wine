import "./bootstrap";
import "~resources/scss/app.scss";
import * as bootstrap from "bootstrap";
import.meta.glob(["../img/**"]);

const inputRange = document.getElementById('my-range');
if (inputRange) {

    updateValue(inputRange.value);

    console.log(inputRange);
    inputRange.addEventListener('change', () => {
        console.log(inputRange.value);
        updateValue(inputRange.value);
    });
}


function updateValue(val) {
    document.getElementById('range-value').innerHTML = val;
}