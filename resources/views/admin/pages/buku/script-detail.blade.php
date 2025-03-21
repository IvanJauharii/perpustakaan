<script>
    function openModal(id) {

        const rows = document.querySelectorAll("#popup-modal tbody tr");
        rows.forEach(row => row.style.display = "none");
        rows.forEach(row => {
            if (row.querySelector("td").innerText.trim() == id) {
                row.style.display = "table-row";

            }
        });
        const modal = document.getElementById("popup-modal");
        const content = document.getElementById("popup-content");

        modal.classList.remove("hidden");
        setTimeout(() => {
            content.classList.remove("opacity-0", "scale-95");
            content.classList.add("opacity-100", "scale-100");
        }, 10);
    }

    function closeModal() {
        const modal = document.getElementById("popup-modal");
        const content = document.getElementById("popup-content");

        content.classList.remove("opacity-100", "scale-100");
        content.classList.add("opacity-0", "scale-95");

        setTimeout(() => {
            modal.classList.add("hidden");
        }, 300);
    }
</script>
