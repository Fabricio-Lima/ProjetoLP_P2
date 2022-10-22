const masks = {
    CPF(value) {
        return value.replace(/\D/g, "")
            .replace(/(\d{3})(\d)/, "$1.$2")
            .replace(/(\d{3})(\d)/, "$1.$2")
            .replace(/(\d{3})(\d{1,2})/, "$1-$2")
            .replace(/(-\d{2})\d+?$/, "$1")
    },

    Phone(value) {
        return value.replace(/\D/g, "")
            .replace(/(\d{2})(\d)/, "($1) $2")
            .replace(/(\d{4})(\d)/, "$1-$2")
            .replace(/(\d{4})-(\d)(\d{4})/, "$1$2-$3")
            .replace(/(-\d{4})\d+?$/, "$1")

    },
    Name(value) {
        return value.replace(/\d/, "")
    },
}


const inputs = document.querySelectorAll("input");

inputs.forEach((input) => {
    const field = input.dataset.js
    input.addEventListener("input", (event) => {
        const value = event.target.value
        event.target.value = masks[field](value)
    })

    input.addEventListener("click", () => {
        input.classList.remove("is-invalid")
    })
})

function register(event) {
    inputs.forEach((input) => {
        !input.value && isValidationFalse(event, input)

        if (input.dataset.js == "CPF") {

            const regexCPF = /^\d{3}\.\d{3}\.\d{3}\-\d{2}$/
            !regexCPF.test(input.value) && isValidationFalse(event, input)
        }
        if (input.dataset.js == "Phone") {

            const regexPhone = /(\(?\d{2}\)?\s)?(\d{4,5}\-\d{4})/
            !regexPhone.test(input.value) && isValidationFalse(event, input)
        }
        if (input.dataset.js == "password") {
            input.value.length <= 4 && isValidationFalse(event, input)
        }
        if (input.dataset.js == "Name") {
            input.value.length < 2 && isValidationFalse(event, input)
        }
        if (input.dataset.js == "Phone") {

            const regexEmail = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/
            !regexEmail.test(input.value) && isValidationFalse(event, input)
        }
    })
}


function isValidationFalse(event, input) {
    event.preventDefault();
    input.classList.add("is-invalid")
}
