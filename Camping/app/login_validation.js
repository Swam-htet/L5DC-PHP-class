function login_validation() {
  var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

  if (email === "" || password === "") {
    alert("Please enter your address and password.");
    return false;
  }

  if (!emailRegex.test(email)) {
    alert("Please enter a valid email address.");
    return false;
  }
}

// submit button DOM
let btn_submit = document.getElementById("button");
let email = document.getElementById("email");
let password = document.getElementById("password");

console.log(btn_submit);
console.log(email);
console.log(password);

btn_submit.addEventListener("click", login_validation);
