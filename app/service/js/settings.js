// Storing DOM as variables
const settingsForm = document.querySelector("#settings-form"),
    settingsBtn = document.querySelector("#settings-btn");

var errText = document.querySelector("#err-text");

// when the form is submitted
settingsForm.onsubmit = (e) => {
    // Prevent form from submitting
    e.preventDefault();
}

//Using ajax to submit forms instead
settingsBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "service/php/save.settings.php", "yes");
    xhr.onload = () => {
        if (xhr.readyState == 4) {
            errText.textContent = xhr.response;

            setTimeout(() => {
                location.href = "settings.php";
            }, 2000);
        }
    }

    // Creating and sending FormData object
    let formData = new FormData(settingsForm);
    xhr.send(formData);
}