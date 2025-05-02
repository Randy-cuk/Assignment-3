function validateForm() {
    const username = document.getElementById("reg_username").value;
    const password = document.getElementById("reg_password").value;

    if (username.length < 3 || password.length < 6) {
        alert("Username must be at least 3 characters and password at least 6.");
        return false;
    }
    return true;
}
