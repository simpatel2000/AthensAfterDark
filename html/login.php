<?php 
  require("../php/database.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../css/style.css">
    <title>Sign In</title>
    <script src="../js/main.js"></script>
    <script src="../js/login.js"></script>
    <style>
      body {
        display: flex;
        flex-direction: column;
      }
      legend {
        margin-bottom: 10px;
        margin-top: 7px;
      }
      .infofields {
        display: flex;
        flex-direction: column;
        width: 200px;
      }
      .infodiv {
        display: flex;
        justify-content: center;
        align-content: center;
        margin: auto;
        padding-top: 5vh;
        width: 300px;
      }

      .inform {
        display: flex;
        justify-content: center;
        align-content: center;
        margin: auto;
      }

      .informpic {
        display: flex;
        justify-content: center;
        align-content: center;
        margin: auto;
        width: 400px;
        padding-top: 15vh;
      }

      h5 {
        display: block;
        padding-top: 32.5vh;
        color: red;
        position: absolute;
        margin-left: 45vw;
        margin-right: auto;
        text-align: center;
      }

      input.btn {
        background-color: #da0000;
        border: none;
        color: #f1f1f1;
        padding: 15px 15px;
        font-size: 12px;
        text-align: center;
        text-decoration: none;
        display: inline-block;
        margin: 1px;
        margin-left: 5px;
        border: none;
        border-radius: 5px;
      }

      input.btn:hover {
	      background: #af0000;
      }

      input.inputbox {
        width: 80%;
        padding: 0.9em;
        margin-top: 0.5em;
        margin-bottom: 1em;
        background-color: rgb(240, 239, 239);
        border: none;
        border-radius: 5px;
      }

      select {
        border: none;
        border-radius: 5px;
        padding: 15px 15px;
        background-color: rgb(240, 239, 239);
        margin-left: 6px;
        margin-bottom: 5px;
      }

      p.inform{
        margin-top: 10px;
      }
      
    </style>
  </head>
<body onload="stylePage();">

      

<img src="../logos/logo.png" class="informpic">
<p class="inform">Local late night food delivery</p>

    <div id="logindiv" class="infodiv">
    
      <fieldset id='loginfields' class="infofields">
        <form action="../php/loginscript.php" method="POST" onsubmit="return login();">
        <legend>Sign In</legend>
        <p id="emailValidity"> Email is invalid</p>
        <p id="passValidity"> Password is invalid</p>
        <p id="loginValidity"> Email/Password do not match our records</p>
        <input id="logemail" name="email" type="email" placeholder="E-mail" class="inputbox">
        <input id="logpass" name="password" type="password" placeholder="Password" class="inputbox">
        <input id="logsignin" type="submit" value="Sign in" class="btn">
        <input type="button" value="Create Account" onclick="createAccountClick();" class="btn">
        </form>
      </fieldset>
    </div>

    <div id="creatediv" class="infodiv" style="display: none;">

      <fieldset id="createfields" class="infofields">
        <legend>Create an Account</legend>
        <p id="eval">Email is invalid</p>
        <p id="ematch">Emails do not match</p>
        <p id="pval">Password is invalid</p>
        <p id="pmatch">Passwords do not match</p>
        <form action="../php/adduserinfo.php" method="POST" onsubmit="return validateCreate();">
        <input name ="cEmail" id="createEmail" type="email" required placeholder="E-mail" class="inputbox">
        <input id="confirmEmail" type="email" required placeholder="Confirm E-mail" class="inputbox">
        <input name="cPass" id="createPass" type="password" required placeholder="Password" class="inputbox">
        <input id="confirmPass" type="password" required placeholder="Confirm Password" class="inputbox">
        <input name="streets" id="streedAddress" type="text" required placeholder="Street Address" class="inputbox">
        <input name="cities" id="city" type="text" required placeholder="City" class="inputbox">
        <select name="st" id="state" list="states" required>
        <datalist id="states">
          <option disabled selected value>Choose State</option>
          <option value="AL">Alabama</option>
          <option value="AK">Alaska</option>
          <option value="AZ">Arizona</option>
          <option value="AR">Arkansas</option>
          <option value="CA">California</option>
          <option value="CO">Colorado</option>
          <option value="CT">Connecticut</option>
          <option value="DE">Delaware</option>
          <option value="DC">District Of Columbia</option>
          <option value="FL">Florida</option>
          <option value="GA">Georgia</option>
          <option value="HI">Hawaii</option>
          <option value="ID">Idaho</option>
          <option value="IL">Illinois</option>
          <option value="IN">Indiana</option>
          <option value="IA">Iowa</option>
          <option value="KS">Kansas</option>
          <option value="KY">Kentucky</option>
          <option value="LA">Louisiana</option>
          <option value="ME">Maine</option>
          <option value="MD">Maryland</option>
          <option value="MA">Massachusetts</option>
          <option value="MI">Michigan</option>
          <option value="MN">Minnesota</option>
          <option value="MS">Mississippi</option>
          <option value="MO">Missouri</option>
          <option value="MT">Montana</option>
          <option value="NE">Nebraska</option>
          <option value="NV">Nevada</option>
          <option value="NH">New Hampshire</option>
          <option value="NJ">New Jersey</option>
          <option value="NM">New Mexico</option>
          <option value="NY">New York</option>
          <option value="NC">North Carolina</option>
          <option value="ND">North Dakota</option>
          <option value="OH">Ohio</option>
          <option value="OK">Oklahoma</option>
          <option value="OR">Oregon</option>
          <option value="PA">Pennsylvania</option>
          <option value="RI">Rhode Island</option>
          <option value="SC">South Carolina</option>
          <option value="SD">South Dakota</option>
          <option value="TN">Tennessee</option>
          <option value="TX">Texas</option>
          <option value="UT">Utah</option>
          <option value="VT">Vermont</option>
          <option value="VA">Virginia</option>
          <option value="WA">Washington</option>
          <option value="WV">West Virginia</option>
          <option value="WI">Wisconsin</option>
          <option value="WY">Wyoming</option>
        </datalist>
        <input name="zip" id="zipcode" type="number" required placeholder="Zip Code" class="inputbox">
        <input id="signup" type="submit" value="Sign Up" class="btn">
      </form>
      </fieldset>
    </div>

</body>
</html>
