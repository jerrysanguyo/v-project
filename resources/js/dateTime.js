function updateDateTime() {
    const now = new Date();
    const dateElem = document.getElementById("date");
    const timeElem = document.getElementById("time");

    const dateOptions = { weekday: "long", month: "short", day: "numeric" };
    if (dateElem) {
        dateElem.textContent = now.toLocaleDateString("en-US", dateOptions);
    }

    if (timeElem) {
        timeElem.textContent = now.toLocaleTimeString("en-US", {
            hour: "numeric",
            minute: "numeric",
            second: "numeric",
        });
    }
}

updateDateTime();
setInterval(updateDateTime, 1000);