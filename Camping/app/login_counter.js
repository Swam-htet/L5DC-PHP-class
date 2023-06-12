// let loginAttempts = 0;
// let countdownInterval;

// function login() {
//   // Simulate login logic
//   const username = document.getElementById('username').value;
//   const password = document.getElementById('password').value;

//   // Check username and password
//   if (username === 'admin' && password === 'password') {
//     // Successful login
//     console.log('Login successful');
//     // Reset login attempts
//     loginAttempts = 0;
//     // Clear the countdown interval
//     clearInterval(countdownInterval);
//   } else {
//     // Failed login
//     console.log('Login failed');
//     loginAttempts++;
//     if (loginAttempts >= 3) {
//       // Disable login form for 10 minutes
//       disableLoginForm();
//       // Start countdown timer for 10 minutes
//       startCountdownTimer(10 * 60);
//     }
//   }
// }

// function disableLoginForm() {
//   // Disable form fields and submit button
//   document.getElementById('username').disabled = true;
//   document.getElementById('password').disabled = true;
//   document.getElementById('loginBtn').disabled = true;

//   // Display message or perform other actions as needed
//   console.log('Login disabled for 10 minutes');
// }

// function enableLoginForm() {
//   // Enable form fields and submit button
//   document.getElementById('username').disabled = false;
//   document.getElementById('password').disabled = false;
//   document.getElementById('loginBtn').disabled = false;

//   // Display message or perform other actions as needed
//   console.log('Login enabled');
// }

// function startCountdownTimer(duration) {
//   const countdownElement = document.getElementById('countdown');
//   let timer = duration;

//   countdownInterval = setInterval(function() {
//     const minutes = Math.floor(timer / 60);
//     const seconds = timer % 60;

//     countdownElement.textContent = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;

//     if (--timer < 0) {
//       // Enable login form after the countdown ends
//       clearInterval(countdownInterval);
//       enableLoginForm();
//       countdownElement.textContent = '';
//     }
//   }, 1000);
// }

console.log("This is login counter js file");

let counter = () => {
  console.log("This is counter function");
};
