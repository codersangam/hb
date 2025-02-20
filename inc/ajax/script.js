document.getElementById("loginForm").addEventListener("submit", function (event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch("login.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            document.getElementById("loginMessage").textContent = data.message;
            if (data.success) {
                window.location.href = "dashboard.php";
            }
        })
        .catch(error => console.error("Error:", error));
});



document.getElementById("registerForm").addEventListener("submit", function (event) {
    event.preventDefault();

    let formData = new FormData(this);

    fetch("register.php", {
        method: "POST",
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            document.getElementById("registerMessage").textContent = data.message;
            if (data.success) {
                setTimeout(() => location.reload(), 2000);
            }
        })
        .catch(error => console.error("Error:", error));
});

