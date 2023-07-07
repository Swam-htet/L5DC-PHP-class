let alert_js = (para) => {
  console.log("alert function is running");
  console.log("input para >> ", para);

  setTimeout(() => {
    console.log("alert is closed");
  }, 5000);
};

export default alert_js;
