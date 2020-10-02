// Variables
let form = document.querySelector("#login_form");
let username = document.querySelector("#username");
let password = document.querySelector("#password");

// Functions
function invalidAlert(errorFieldSelector, errorText) {
  let selector = document.querySelector(errorFieldSelector);
  selector.innerText = errorText;
}

form.addEventListener("submit", function (event) {
  if (username.value == "" && password.value == "") {
    alert("Fill all fields");
    username.focus();
    event.preventDefault();
    return;
  }
  if (username.value.trim() === "") {
    username.focus();
    invalidAlert("#usernameError", "Username not filled");
    event.preventDefault();
    return;
  }
  if (password.value.trim() === "") {
    password.focus();
    invalidAlert("#passwordError", "Password not filled");
    event.preventDefault();
    return;
  }
});
