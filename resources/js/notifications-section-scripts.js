   document.querySelectorAll(".noti-header").forEach(header => {
    header.addEventListener("click", (event) => {
        const body = event.currentTarget.nextElementSibling; 
        if (!body) return; // Por seguridad

        if (body.classList.contains("hidden")) {
            body.classList.remove("hidden");
            body.classList.add("flex");
        } else {
            body.classList.remove("flex");
            body.classList.add("hidden");
        }
    });
});