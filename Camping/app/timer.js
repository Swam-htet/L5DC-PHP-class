// dom node
let timer = document.getElementById("timer_box");
let login = document.getElementById("login_box");

console.log(timer);
console.log(login);

login.style.display = "none";

function startTimer() {
  var startTime = new Date().getTime();

  // Update the timer every second
  var timerInterval = setInterval(function () {
    var currentTime = new Date().getTime();
    var show_time = 1 * 60000 - (currentTime - startTime);

    var minutes = Math.floor(show_time / 60000);
    var seconds = Math.floor((show_time % 60000) / 1000);

    timer.innerHTML = `<div class='alert alert-danger p-5'> 
            Waiting Time:  ${minutes} minutes : ${seconds}  seconds
        </div>`;

    if (show_time <= 0) {
      clearInterval(timerInterval);
      console.log("Login Again!");

      timer.style.display = "none";
      login.style.display = "block";
    }
  }, 1000);
}

// Start the timer
startTimer();
