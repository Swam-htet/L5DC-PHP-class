// 2 button
let prev = document.querySelector("#prev");
let next = document.querySelector("#next");

// image list
let imgs = document.querySelectorAll(".carousel-card");

// length of image list
let totalImgs = imgs.length;

// counter
let imgPosition = 0;

// Event Listeners to click button
next.addEventListener("click", nextImg);
prev.addEventListener("click", prevImg);

// Update Position
function updatePosition() {
  //   Images
  for (let img of imgs) {
    // console.log(img);
    img.classList.remove("visible");
    img.classList.add("hidden");
  }
  imgs[imgPosition].classList.remove("hidden");
  imgs[imgPosition].classList.add("visible");
}

// Next Img
function nextImg() {
  if (imgPosition === totalImgs - 1) {
    imgPosition = 0;
  } else {
    imgPosition++;
  }
  updatePosition();
  // console.log("Next function");
}

//Previous Image
function prevImg() {
  if (imgPosition === 0) {
    imgPosition = totalImgs - 1;
  } else {
    imgPosition--;
  }
  updatePosition();
  // console.log("Prev function");
}

setInterval(() => {
  nextImg();
  // console.log("carousel is working again and again after 3s");
}, 3000);
