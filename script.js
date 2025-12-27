document.getElementById("registerForm").addEventListener("submit", function(e) {
    const email = document.getElementById("email").value;

    if (email === "admin@gmail.com") {
        e.preventDefault();
        window.location.href = "admin.html";
    }
});