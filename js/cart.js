function stylePage() {
    document.getElementById("couponValidity").style.display = "none";
}

function validateCoupon() {
    var code = document.getElementById("coupon");
    if (code.value == "FREEDELIVERY" || code.value == "25FIRST" || code.value == "15PIZZA") {
        document.getElementById("couponValidity").style.display = "none";
        return true; 
    } else {
      document.getElementById("couponValidity").style.display = "block";
      return false;
    }  
  }

  function applyCoupon() {
    var valid1 = validateCoupon();
    if (valid1) {   
        return true;
      } else {
        return false;
      }
  }