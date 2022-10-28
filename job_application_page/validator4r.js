// validator2r.js
//   The last part of validator2. Registers the 
//   event handlers
//   Note: This script does not work with IE8

// Get the DOM addresses of the elements and register 
//  the event handlers

      var nameNode = document.getElementById("name");
      var phoneNode = document.getElementById("phone");
      var emailNode = document.getElementById("email");
      var dateNode = document.getElementById("date");
      nameNode.addEventListener("change", chkName, false);
      phoneNode.addEventListener("change", chkPhone, false);
      emailNode.addEventListener("change", chkEmail, false);
      dateNode.addEventListener("change", chkDate, false);