//sidebar
const hamburger = document.getElementById("hamburger");
const sidebar = document.querySelector(".sidebar");
const main = document.querySelector(".main");

hamburger.onclick = function () {
    sidebar.classList.toggle("hide");
    main.classList.toggle("full");
};

//dropdown btn
document.querySelector(".dropdown-btn").onclick = function () {
    this.parentElement.classList.toggle("active");
};

//navbar
document.querySelectorAll(".nav-trigger").forEach((trigger) => {
    trigger.addEventListener("click", function () {
        this.parentElement.classList.toggle("active");
    });
});
