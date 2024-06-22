const nightThemeBtn = document.getElementById("switch")

nightThemeBtn.addEventListener("click", function() {
    document.body.classList.toggle("night-theme")

    const theme = localStorage.getItem("theme")

    if (theme === "night-theme") {
        localStorage.setItem("theme", "")
    } else {
        localStorage.setItem("theme", "night-theme")
    }
})