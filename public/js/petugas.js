//sidebar
document.addEventListener("DOMContentLoaded", function () {
    const hamburger = document.getElementById("hamburger");
    const sidebar = document.querySelector(".sidebar");
    const main = document.querySelector(".main");

    if (hamburger) {
        hamburger.onclick = function () {
            sidebar.classList.toggle("hide");
            main.classList.toggle("full");
        };
    }
});

//dropdown btn
document.querySelectorAll(".dropdown-btn").forEach((btn) => {
    btn.addEventListener("click", function () {
        this.parentElement.classList.toggle("active");
    });
});

//navbar
document.querySelectorAll(".nav-trigger").forEach((trigger) => {
    trigger.addEventListener("click", function () {
        this.parentElement.classList.toggle("active");
    });
});
