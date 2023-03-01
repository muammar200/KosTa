document.getElementById("re-password").addEventListener("input", checkPassword);
function checkPassword() {
  var password = document.getElementById("password").value;
  var rePassword = document.getElementById("re-password").value;
//   var rePasswordInput = document.getElementById("re-password");

  if (password !== rePassword) {
    document.getElementById("error-message").innerHTML = "Password tidak sama!";
  } else {
    document.getElementById("error-message").innerHTML = "";
  }
}
