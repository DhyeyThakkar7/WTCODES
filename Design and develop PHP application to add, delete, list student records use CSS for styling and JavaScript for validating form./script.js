function validateForm() {
    const name = document.querySelector('input[name="name"]').value;
    const age = document.querySelector('input[name="age"]').value;

    if (!name || !age) {
        alert("Please fill out all fields.");
        return false;
    }

    if (age <= 0) {
        alert("Please enter a valid age.");
        return false;
    }

    return true;
