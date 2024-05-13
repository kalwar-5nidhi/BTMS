// dashboard.js

function navigateTo(url) {
    window.location.href = url;
}

document.addEventListener("DOMContentLoaded", () => {
    // Add event listeners to navigate to different pages
    document.getElementById("Buses").addEventListener("click", () => navigateTo("busesDisplay.php"));
    document.getElementById("routes-card").addEventListener("click", () => navigateTo("routesDisplay.php"));
    document.getElementById("customers-card").addEventListener("click", () => navigateTo("customersDisplay.php"));
    document.getElementById("booking-card").addEventListener("click", () => navigateTo("bookingDisplay.php"));
    document.getElementById("seats-card").addEventListener("click", () => navigateTo("seatsDisplay.php"));
    // Add similar listeners for other cards as needed
});

