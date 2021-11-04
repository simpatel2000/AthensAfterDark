function stylePage() {
    document.getElementById("emailValidity").style.display = "none";
    document.getElementById("passValidity").style.display = "none";
    document.getElementById("loginValidity").style.display = "none";
    document.getElementById("eval").style.display = "none";
    document.getElementById("ematch").style.display = "none";
    document.getElementById("pval").style.display = "none";
    document.getElementById("pmatch").style.display = "none";
  }

  function createAccountClick() {
    document.getElementById("logindiv").style.display = "none";
    document.getElementById("creatediv").style.display = "flex";
  }

  function signupClick() {
    document.getElementById("logindiv").style.display = "flex";
    document.getElementById("creatediv").style.display = "none";
  }

  function validateEmail() {
    var email = document.getElementById("logemail");
    if(/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
      document.getElementById("emailValidity").style.display = "none";
      return true;
    } else {
      document.getElementById("emailValidity").style.display = "block";
      return false; 
    }
  }

  function validatePassword() {
    var pass = document.getElementById("logpass");
    if (pass.value == "") {
      document.getElementById("passValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("passValidity").style.display = "none";
      return true; 
    }  
  }

  function login() {
    var valid1 = validateEmail();
    var valid2 = validatePassword();
    if (valid1 && valid2) {   
      return true;
    } else {
      return false;
    }
  }

  function valE() {
    var emaila = document.getElementById("createEmail");

    if(/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emaila.value)) {
      document.getElementById("eval").style.display = "none";
      return true;
    } else {
      document.getElementById("eval").style.display = "block";
      return false; 
    }
  }

  function valP() {
    var passa = document.getElementById("createPass");

    if (passa.value == "") {
      document.getElementById("pval").style.display = "block";
      return false;
    } else {
      document.getElementById("pval").style.display = "none";
      return true; 
    }  
  }

  function emailMatch() {
      var email1 = document.getElementById("createEmail");
      var email2 = document.getElementById("confirmEmail");

      if (email1.value != email2.value) {
        document.getElementById("ematch").style.display = "block";
        return false;
      }
      document.getElementById("ematch").style.display = "none";
      return true;


  }

  function passwordMatch() {
    var pass1 = document.getElementById("createPass");
    var pass2 = document.getElementById("confirmPass");

    if (pass1.value != pass2.value) {
      document.getElementById("pmatch").style.display = "block";
      return false;
    }
    document.getElementById("ematch").style.display = "none";
    return true;
  }

  function validateCreate() {
    var v1 = emailMatch();
    var v2 = passwordMatch();
    var v3 = valE();
    var v4 = valP();

    if (v1 && v2 && v3 && v4) {
      return true;
    } else {
      return false;
    }
      
  }