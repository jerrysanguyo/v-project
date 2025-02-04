const correctPasscode = "031120";
let inputPasscode = "";
const passcodeDisplay = document.getElementById("passcode-display");
const errorMsg = document.getElementById("error-msg");
const keys = document.querySelectorAll(".key");

function updateDisplay() {
    const dots = passcodeDisplay.children;
    for (let i = 0; i < dots.length; i++) {
        if (i < inputPasscode.length) {
            dots[i].classList.add("bg-white");
            dots[i].classList.remove("border-white");
        } else {
            dots[i].classList.remove("bg-white");
            dots[i].classList.add("border-white");
        }
    }
}

function resetPasscode() {
    inputPasscode = "";
    updateDisplay();
}

keys.forEach((key) => {
    key.addEventListener("click", () => {
        if (key.id === "delete") {
            inputPasscode = inputPasscode.slice(0, -1);
            updateDisplay();
            return;
        }

        if (inputPasscode.length < 6) {
            inputPasscode += key.textContent.trim();
            updateDisplay();
        }

        if (inputPasscode.length === 6) {
            if (inputPasscode === correctPasscode) {
                window.location.href = "/home";
            } else {
                errorMsg.classList.remove("hidden");
                setTimeout(() => {
                    errorMsg.classList.add("hidden");
                    resetPasscode();
                }, 2000);
            }
        }
    });
});
