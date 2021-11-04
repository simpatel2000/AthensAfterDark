function stylePage() {
    document.getElementById("nameValidity").style.display = "none";
    document.getElementById("emailValidity").style.display = "none";
    document.getElementById("adrValidity").style.display = "none";
    document.getElementById("cityValidity").style.display = "none";
    document.getElementById("stateValidity").style.display = "none";
    document.getElementById("zipValidity").style.display = "none";
    document.getElementById("cardNameValidity").style.display = "none";
    document.getElementById("cardNumberValidity").style.display = "none";
    document.getElementById("expMonthValidity").style.display = "none";
    document.getElementById("expYearValidity").style.display = "none";
    document.getElementById("cvvValidity").style.display = "none";
  }

  function validateName() {
    var name = document.getElementById("name");
    if (name.value == "") {
      document.getElementById("nameValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("nameValidity").style.display = "none";
      return true; 
    }  
  }
  function validateEmail() {
    var email = document.getElementById("email");
    if(email.value == "") {
      document.getElementById("emailValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("emailValidity").style.display = "none";
      return true; 
    }  
  }
  function validateAddress() {
    var adr = document.getElementById("adr");
    if (adr.value == "") {
      document.getElementById("adrValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("adrValidity").style.display = "none";
      return true; 
    }  
  }
  function validateCity() {
    var city = document.getElementById("city");
    if (city.value == "") {
      document.getElementById("cityValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("cityValidity").style.display = "none";
      return true; 
    }  
  }

  function validateState() {
    var state = document.getElementById("state");
    if (state.value == "") {
      document.getElementById("stateValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("stateValidity").style.display = "none";
      return true; 
    }  
  }

  function validateZip() {
    var zip = document.getElementById("zip");
    if (zip.value == "") {
      document.getElementById("zipValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("zipValidity").style.display = "none";
      return true; 
    }  
  }

  function checkout() {
    var valid1 = validateName();
    var valid2 = validateEmail();
    var valid3 = validateAddress();
    var valid4 = validateCity();
    var valid5 = validateState();
    var valid6 = validateZip();

    var valid7 = validateCardName();
    var valid8 = validateCardNumber();
    var valid9 = validateExpMonth();
    var valid10 = validateExpYear();
    var valid11 = validateCVV();
    if (valid1 && valid2 && valid3 && valid4 && valid5 && valid6 && valid7 && valid8 && valid9 && valid10 && valid11) {   
      return true;
    } else {
      return false;
    }
  }

  function validateCardName() {
    var cardName = document.getElementById("ccname");
    if (cardName.value == "") {
      document.getElementById("cardNameValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("cardNameValidity").style.display = "none";
      return true; 
    }  
  }

  function validateCardNumber() {
    var cardNum = document.getElementById("ccnum");
    if (cardNum.value == "") {
      document.getElementById("cardNumberValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("cardNumberValidity").style.display = "none";
      return true; 
    }  
  }
  function validateExpMonth() {
    var expMonth = document.getElementById("expm");
    if (expMonth.value == "") {
      document.getElementById("expMonthValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("expMonthValidity").style.display = "none";
      return true; 
    }  
  }
  function validateExpYear() {
    var expYear = document.getElementById("expy");
    if (expYear.value == "") {
      document.getElementById("expYearValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("expYearValidity").style.display = "none";
      return true; 
    }  
  }
  function validateCVV() {
    var cvv = document.getElementById("cvv");
    if (cvv.value == "") {
      document.getElementById("cvvValidity").style.display = "block";
      return false;
    } else {
      document.getElementById("cvvValidity").style.display = "none";
      return true; 
    }  
  }