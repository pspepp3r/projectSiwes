/**
 * @author PSPepp3r
 * @description 
 */

// Storing variables
const formBtns = document.querySelectorAll(".form-button"),
	forms = document.querySelectorAll(".form"),
	hText = document.querySelector("#h-text"),
	username = document.querySelector("#uname"),
	loginPlace = document.querySelector(".login"),
	signupPlace = document.querySelector(".signup"),
	password = document.querySelector("#pass"),
	newUsername = document.querySelector("#nuname"),
	newpassword = document.querySelector("#npass"),
	newEmail = document.querySelector("#nemail"),
	ndpic = document.querySelector("#ndpic");

var errText = document.querySelector(".err"),
	errText2 = document.querySelector(".nerr");

// Automatically hides the signup form behid the div
signupPlace.style.transform = "translateX(100%)";


/**
 * This swaps between the login and signup forms
 * @returns void
 */
function swapForm() {
	// Looping through the divs
	formBtns.forEach((element) => {
		// Remove the class 'selected' from all divs
		element.classList.remove("selected");
	});

	// Adds 'selected' as a class in the clicked div
	this.classList.add("selected");

	// Looping through the forms
	forms.forEach((form) => {
		// Checks if 'b-sign' is in the class list of the clicked div
		if (this.classList[1] == "b-sign") {
			// Shifts the form to be seen
			form.style.transform = "translateX(-100%)";
			// The description text changes
			hText.textContent = "Oh, a new user 😁";
			// Hides the other form displaying this clicked one
			signupPlace.style.transform = "translateX(-150%)";
			loginPlace.style.transform = "translateX(-500%)";

			// Resetting the values of the other form
			username.value = "";
			password.value = "";
			errText.textContent = "";
		} else {
			// Shifts the form to be seen
			form.style.transform = "translateX(0px)";
			// The description text changes
			hText.textContent = "Please login to use apps";
			// Hides the other form displaying this clicked one
			signupPlace.style.transform = "translateX(100%)";

			// Reset the values of the other form
			newEmail.value = "";
			newUsername.value = "";
			newpassword.value = "";
			ndpic.value = "";
			errText2.textContent = "";
		}
	});
}

// Looping through the divs
formBtns.forEach((item) => {
	// Adds event listeners to all the divs
	item.addEventListener("click", swapForm);
});

//keypress events
