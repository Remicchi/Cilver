// validator2.js
//   An example of input validation using the change and submit 
//   events, using the DOM 2 event model
//   Note: This document does not work with IE8

// ********************************************************** //
// The event handler function for the name text box

function chkName(event) {

// Get the target node of the event

  var myName = event.currentTarget;

// Test the format of the input name 
//  Allow the spaces after the commas to be optional
//  Allow the period after the initial to be optional

  var pos = myName.value.search(/^[A-za-z\s]+$/);

  if (pos != 0) {
    alert("The name you entered (" + myName.value + 
          ") is not in the correct form. \n" +
          "The correct form is: " +
          "First-name Last-name\n" +
          "First letters are capitalized");
    myName.focus();
    myName.select();
    document.getElementById("name").value = "";
	return false;
  } 
}

// ********************************************************** //
// The event handler function for the phone text box

function chkPhone(event) {

// Get the target node of the event

  var myPhone = event.currentTarget;
// Test the format of the input email
 
  var pos = myPhone.value.search(/^[0-9]{8}$/);
 
  if (pos != 0) {
    alert("The Phone Number you entered (" + myPhone.value +
          ") is not in the correct form. \n" +
          "Please go back and fix your Phone Number");
    myPhone.focus();
    myPhone.select();
    document.getElementById("phone").value = "";
  return false;
  } 
}

// ********************************************************** //
// The event handler function for the email text box

function chkEmail(event) {

// Get the target node of the event

  var myEmail = event.currentTarget;
// Test the format of the input email
 
  var pos = myEmail.value.search(/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)([\.-]?\w+)(\.\w{2,3})$/);
 
  if (pos != 0) {
    alert("The Email you entered (" + myEmail.value +
          ") is not in the correct form. \n" +
          "Please go back and fix your Email");
    myEmail.focus();
    myEmail.select();
    document.getElementById("email").value = "";
	return false;
  } 
}

// ********************************************************** //
// The event handler function for the date box

function chkDate(event) {

// Get the target node of the event

  var myDate = event.currentTarget;
  var today = new Date();
  var dd = String(today.getDate()).padStart(2, '0');
  var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
  var yyyy = today.getFullYear();

  today = yyyy + '-' + mm + '-' + dd;
// Test the format of the input email
 
  if(myDate.value <= today) {
    alert('Please choose a day starting from tomorrow');
    myDate.focus();
    myDate.select();
    document.getElementById("date").value = "";
  return false;
  }
}

// ********************************************************** //
// Check for condition before you can submit
// function submitCheck(event) {
//   event.preventDefault();
// }