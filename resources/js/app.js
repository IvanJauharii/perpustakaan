import "./bootstrap";
import feather from "feather-icons";
import Alpine from "alpinejs";
import "../css/app.css";

window.Alpine = Alpine;
document.addEventListener("DOMContentLoaded", function () {
    feather.replace();
});

Alpine.start();
