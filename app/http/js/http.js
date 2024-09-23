//Assigning variables for form submission
const loginForm = document.querySelector("#login"),
    loginBtn = document.querySelector("#login-btn"),
    signupForm = document.querySelector("#signup"),
    signupBtn = document.querySelector("#signup-btn");
var errText = document.querySelector(".err"),
    errText2 = document.querySelector(".nerr");

//cancelling forms's default action
loginForm.onsubmit = (e) => {
    e.preventDefault();
}

signupForm.onsubmit = (e) => {
    e.preventDefault();
}

//using ajax to submit forms
loginBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "app/http/php/login.php", "yes");
    xhr.onload = () => {
        if (xhr.readyState == 4) {
            let data = xhr.response;
            if (data == "Success") {
                location.href = "app/home.php";
            } else {
                errText.style.display = "block";
                errText.textContent = data;
            }
        }
    }
    let formData = new FormData(loginForm);
    xhr.send(formData);
}

signupBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "app/http/php/signup.php", "yes");
    xhr.onload = () => {
        if (xhr.readyState == 4) {
            let data = xhr.response;
            if (data == "Success") {
                location.href = "app/home.php";
            } else {
                errText2.style.display = "block";
                errText2.textContent = data;
            }
        }
    }
    let formData = new FormData(signupForm);
    xhr.send(formData);
}
