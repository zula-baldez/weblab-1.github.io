
const xInput = document.getElementById("xInput")
const yInput = document.getElementById("yInput")

const xElementWarning = document.getElementById("x-warning")
const yElementWarning = document.getElementById("y-warning")

const formElement = document.getElementById("form")
const submitButton = document.getElementById("form-submit")

    function warning(elem, txt) {
        elem.innerHTML = txt;
        submitButton.disabled = true

    }
    function hideWarning(elem, txt) {
        elem.innerHTML = txt
        submitButton.disabled = false
        


    }
    function validateX(event) {


        let x = parseFloat(xInput.value);
        if(Number.isNaN(x) || x < -5 || x > 5) {
            warning(xElementWarning, "X must be from -5 to 5")
        } else {
            hideWarning(xElementWarning, "")
        }
    }
    xInput.addEventListener('input', validateX)
    xInput.dispatchEvent(new Event('input'))
