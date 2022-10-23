const inputs = document.querySelectorAll("input");


inputs.forEach((input) => {
    input.addEventListener("click", () => {
        input.classList.contains("is-invalid")
            && input.classList.remove("is-invalid")
    })
})

function onSubmit(event) {
    inputs.forEach((input) => {
        if (input.value === "") {
            event.preventDefault();
            input.classList.add("is-invalid")
        }
    })
}
