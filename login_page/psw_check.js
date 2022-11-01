
function chkPasswords(event) { 
  var init = document.getElementById("psw1");
  var sec = document.getElementById("psw2");
  if (init.value == "") {
    alert("You did not enter a password \n" +
          "Please enter one now");
    init.focus();
    return false;
  }
  if (init.value != sec.value) {
    alert("The two passwords you entered are not the same \n");
    init.focus();
    init.select();
    return false;
  } else
    return true;
}
