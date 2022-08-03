// If there's something in the username field, and passwords match with a
// number, and 8 characters long, enable the create button

// Event Listener variables
let username = document.getElementById("username");
let pw1 = document.getElementById("psw");
let pw2 = document.getElementById("psw2");
let submit = document.getElementById("submit");

// Variables for event listeners
let letter = document.getElementById("letter");
let number = document.getElementById("number");
let length = document.getElementById("length");
let match = document.getElementById("match");

// Validation booleans
let usernameB = false;
let pw1B = false;
let pw2B = false;

// Variable used to verifify passwords
let password = "";
let un = "";

username.oninput = function() {
  if(username.value.length > 0) {
    usernameB = true;
    console.log("Username passes: " + usernameB);
    un = username.value
    return un;
  } else {
    usernameB = false;
    return usernameB;
  }
}

pw1.oninput = function() {
  // Validate letters
  let letters = /[a-zA-Z]/g;
  if(pw1.value.match(letters)) {
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }

  // Validate numbers
  let numbers = /[0-9]/g;
  if(pw1.value.match(numbers)) {
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }

  // Validate length
  if(pw1.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }

  if (pw1.value.match(letters) && pw1.value.match(numbers) && pw1.value.length >= 8){
    pw1B = true;
    password = pw1.value;
    console.log("Password passes: " + pw1B);
    return password;
  } else {
    pw1B = false;
    return pw1B;
  }
}

//Almost there Log In isn't disabled if I delete buttons or reset
pw2.oninput = function() {
  console.log("Password: " + pw2.value);
  if(password == pw2.value) {
    console.log(un.length);
    console.log(password);
    match.classList.remove("invalid");
    match.classList.add("valid");
    pw2B = true;
    console.log("Verify Password: " + pw2B);
    if (un.length > 0){
      document.getElementById("create-account").disabled = false;
    } else {
      document.getElementById("create-account").disabled = true;
    }
    return pw2B;
  } else {
    match.classList.remove("valid");
    match.classList.add("invalid");
    pw2B = false;
    return pw2B;
  }
}
