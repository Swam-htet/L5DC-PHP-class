let review_dropdown_function = (id) => {
  console.log("id >> " + id);
  document.getElementById("review-" + id).classList.toggle("show");
};

let delete_dropdown_function = (id) => {
  console.log("id >> " + id);
  document.getElementById("delete-" + id).classList.toggle("show");
};

let booking_dropdown_function = (id) => {
  console.log("id >> " + id);
  document.getElementById("booking-" + id).classList.toggle("show");
};
