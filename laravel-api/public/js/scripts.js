const emailInput = document.querySelector("#email");
const passwordInput = document.querySelector("#password");

emailInput.addEventListener("click", () => {
    emailInput.classList.remove("is-invalid")
})

passwordInput.addEventListener("click", () => {
    passwordInput.classList.remove("is-invalid")
})

function teste(event) {
    if (!emailInput.value || !passwordInput.value) {
        event.preventDefault();
        !emailInput.value && emailInput.classList.add("is-invalid")
        !passwordInput.value && passwordInput.classList.add("is-invalid")
        return;
    }
}
