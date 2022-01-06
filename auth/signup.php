<!DOCTYPE html>
<html lang="en">
<?php
    session_start();
include_once("../includes/head.php");
?>
<body class="bg-darken">
<?php
  include_once("../includes/welcome_navbar.php");
?>
<section class="hero-wrap" style="background-image: url('../assets/images/faci-2.jpg');">
    <br>
<div class="overlay"></div>
<div class="container">
<div class="row  align-items-center justify-content-center">
<div class="col-lg-8 text-white">
    <br>
    </br>
    <ul class="nav nav-tabs mb-4 ">
    <li class="nav-item"><a class="nav-link" href="../index.php">Welcome</a></li>
        <li class="nav-item"><a class="nav-link active" href="../auth/signup.php">Sign-Up</a></li>
        <li class="nav-item"><a class="nav-link" href="../auth/login.php">Log-In</a></li>
    </ul>
<!---Sign up form ----->
    <div id="form-holder">
        <?php
            if(isset($_SESSION['errors'])):
            ?>
            <?php foreach($_SESSION['errors'] as $err => $errMsg): ?>
            <ul class="error-msg">
            <li class="alert alert-danger alert-dismissable" data-dismiss="alert">&times; <?php echo $errMsg; ?>
                </li>
            </ul>
            <?php endforeach; ?>
            <?php endif;
            session_destroy()
                ?>
    <form method="post" action="../processors/signup-user.php" id="form" onsubmit="return validateForm()" >
        <div class="row mb-3">
        <div class="col-lg-6">
            <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" oninput="checkFirstName()" class="form-control" id="firstname" placeholder="Enter Your First Name" name="firstname" autocapitalize="words"/>
        <small id="firstnameHelp error" class="errors"></small>
        </div>
            </div>
            <div class="col-lg-6">
            <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" oninput="checkLastName()" class="form-control" id="lastname" placeholder="Enter Your Last Name" name="lastname" autocapitalize="words" />
        <small id="lastnameHelp error" class="errors"></small>
        </div>
            </div>
        </div>

        <div class="row mb-3">
        <div class="col-lg-6">
            <div class="form-group">
        <label for="number">Mobile Number</label>
        <input type="number" oninput="checkNum()" class="form-control" id="number" placeholder="Enter Your Mobile Number" name="number" />
        <small id="numberHelp error" class="errors"></small>
        </div>
            </div>
             <div class="col-lg-6">
            <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" oninput="validateEmail()" class="form-control" id="email" placeholder="Enter Your E-mail" name="email"/>
        <small id="emailHelp error" class="errors"></small>
        </div>
            </div>
        </div>

        <div class="form-group mb-3" style="width: 100%;">
            <label for="gender" style="padding-right:30px">Gender</label>
        <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="gender" id="male" value="Male">
            <label for="male" class="form-check-label">Male</label>
        </div>
        <div class="form-check form-check-inline">
        <input type="radio" class="form-check-input" name="gender" id="female" value="Female">
            <label for="female" class="form-check-label">Female</label>
        </div>
        <small id="radioHelp" class="errors"></small>
            </div>

        <div class="row mb-4">
        <div class="col-lg-6">
            <label for="password">Password</label>
            <div class="input-group">

        <input type="password" oninput="checkPass()" class="form-control" id="password" placeholder="Enter Your Password" name="password" aria-describedby="passwordHelp"/>
                <div class="input-group-append">
                <button type="button" onclick="showPass()" class="btn btn-primary" id="eye"><i class="fas fa-eye-slash"></i><span class="fa fa-eye" style="display:none"></span></button>
                </div>

        </div>
        <small id="passwordHelp" class="errors"></small>

            </div>
            <div class="col-lg-6">
                <label for="confirmPassword">Confirm Password</label>
            <div class="input-group">

        <input type="password" oninput="matchPass()" class="form-control mb-4" id="confirmPassword" placeholder="Confirm Your Password" name="confirmPassword" aria-describedby="confirmPasswordHelp"/>
            <div class="input-group-append">
                <button type="button" onclick="showPass()" class="btn btn-primary" id="eye"><i class="fas fa-eye-slash"></i><span class="fa fa-eye" style="display:none"></span></button>
                </div>
        </div>
        <small id="confirmPasswordHelp" class="errors" style="margin-top: -5px;"></small>
            </div>
        </div>


        <button type="submit" name="submit" id="submit" class="btn btn-block btn-primary p-4 py-3" style="width:50%; margin-left:25%">SIGN-UP<span class="fa fa-sign-in-alt"></span></button>
        </form>
    </div>
    <!--- End of signup form---->
    <style>
        #form-holder{
            box-shadow: 0 15px 30px rgba(0,0,0,0.1);
            border-radius: 20px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.25);
            border-top: 1px solid rgba(255,255,255,0.5);
            border-left: 1px solid rgba(255,255,255,0.5);
            padding: 40px;
            background: none;
            margin-bottom: 40px !important;
        }
        #eye{
            height: 45px !important;
        }
    </style>
</div>
</div>
</div>

</section>
    <div class="row">
    <div class="col-lg-12">
        <br>
        </br>
        <br>
        </br>
    <br>
        </br>
<br>
        </br>
        <?php
    include_once("../includes/copyright.php");
        include_once("../includes/js_files.php");
    ?>
        </div>
    </div>

</body>
<script>

    function showPass(){

      var inputType = $("#password").attr('type');
        if(inputType == 'password'){
           $('.fa-eye').css({display: "block"});
        $('.fa-eye-slash').css({display: "none"});
        $("#password").attr('type',"text");
            $('#confirmPassword').attr('type',"text");

        }else if(inputType == "text"){
             $('.fa-eye').css({display: "none"});
        $('.fa-eye-slash').css({display: "block"});
        $("#password").attr('type',"password");
            $('#confirmPassword').attr('type',"password");
        }

    }


    //Form validation
    let id = (id) => document.getElementById(id);

let classes = (classes) => document.getElementsByClassName(classes);

let firstname = id("firstname"),
  lastname = id("lastname"),
  number = id("number"),
  email = id("email"),
  password = id("password"),
  confirmPassword = id("confirmPassword"),
  form = id("form"),
male = id("male"),
female = id("female"),
  errorMsg = classes("errors");

//Checking the empty inputs
let validateForm = () =>{
  if(firstname.value.trim() === ""){
    errorMsg[0].classList.add("text-danger");
    errorMsg[0].innerHTML = "First Name cannot be blank" ;
    firstname.style.border = "1px solid red";
    return false;
  }
  if(lastname.value.trim() === ""){
    errorMsg[1].classList.add("text-danger");
    errorMsg[1].innerHTML = "Last Name cannot be blank";
    lastname.style.border = "1px solid red";
    return false;
  }
  if(number.value.trim() === ""){
    errorMsg[2].classList.add("text-danger");
    errorMsg[2].innerHTML = "Mobile Number cannot be blank";
    number.style.border = "1px solid red";
    return false;
  }
  if(email.value.trim() === ""){
    errorMsg[3].classList.add("text-danger");
    errorMsg[3].innerHTML = "Email cannot be blank";
    email.style.border = "1px solid red";
    return false;
  }
  if(!(male.checked || female.checked)){
    errorMsg[4].classList.add("text-danger");
    errorMsg[4].innerHTML = "Choose your gender";
    return false;
  }
  if(password.value.trim() === ""){
    errorMsg[5].classList.add("text-danger");
    errorMsg[5].innerHTML = "Password cannot be blank";
    password.style.border = "1px solid red";
    return false;
  }
  if(password.value.trim() === ""){
    errorMsg[5].classList.add("text-danger");
    errorMsg[5].innerHTML = "Password cannot be blank";
    password.style.border = "1px solid red";
    return false;
  }
  if(confirmPassword.value.trim() === ""){
    errorMsg[6].classList.add("text-danger");
    errorMsg[6].innerHTML = "Password Confirm is empty";
    confirmPassword.style.border = "1px solid red";
    return false;
  }
}

//   let validateForm = (id, serial, message) => {
//
//   if (id.value.trim() === "") {
//     errorMsg[serial].classList.add("text-danger");
//     errorMsg[serial].innerHTML = message;
//     id.style.border = "1px solid red";
//   }
//
//   else {
//     errorMsg[serial].innerHTML = "";
//     id.style.border = "1px solid green";
//
//
//   }
// }
//
// //event listener for the submit button
//   form.addEventListener("submit", (e) => {
//     e.preventDefault();

//   validateForm(firstname, 0, "First Name cannot be blank");
//   validateForm(lastname, 1, "Last Name cannot be blank");
//   validateForm(number, 2, "Mobile Number cannot be blank");
//  validateForm(email, 3, "Email cannot be blank");
//  validateForm(password, 5, "Password cannot be blank");
//  validateForm(confirmPassword, 6, "Password Confirm is empty");
// });

//Checking the strlen of first name
function checkFirstName(){
	var getFirst = firstname.value.trim();
	if(getFirst == ""){
		errorMsg[0].innerHTML = "";

	}else if(getFirst.length < 3){
    errorMsg[0].classList.add("text-danger");
	  errorMsg[0].innerHTML = "Name should not be less than 3";
      firstname.style.border = "1px solid red";

	}else if(getFirst.length > 15){
    errorMsg[0].classList.add("text-danger");
          errorMsg[0].innerHTML = "Name should not be more than 10";
      firstname.style.border = "1px solid red";

	}else{
		    errorMsg[0].innerHTML = "";
      firstname.style.border = "1px solid green";
	}
}

//Checking the strlen of last name
function checkLastName(){
	var getLast = lastname.value.trim();
	if(getLast == ""){
		errorMsg[1].innerHTML = "";

	}else if(getLast.length < 3){
    errorMsg[1].classList.add("text-danger");
	  errorMsg[1].innerHTML = "Name should not be less than 3";
      lastname.style.border = "1px solid red";

	}else if(getLast.length > 15){
    errorMsg[1].classList.add("text-danger");
          errorMsg[1].innerHTML = "Name should not be more than 10";
      lastname.style.border = "1px solid red";

	}else{
		    errorMsg[1].innerHTML = "";
      lastname.style.border = "1px solid green";
	}
}

//phone number validation
function checkNum(){
  var getNum = number.value.trim();
  var regExp = /^\d{11}$/;
  if(getNum.match(regExp)){
    errorMsg[2].innerHTML = "";
  number.style.border = "1px solid green";
}else if(getNum == ""){
  errorMsg[2].innerHTML = "";
number.style.border = "0px solid green";
}else {
  errorMsg[2].classList.add("text-danger");
        errorMsg[2].innerHTML = "Incorrect mobile number";
    number.style.border = "1px solid red";
}
}

//email validation
function validateEmail(){
  var getEmail = email.value.trim();
  var regExp = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;

	if(regExp.test(getEmail)){
		errorMsg[3].innerHTML = "";
      email.style.border = "1px solid green";

	}else if(getEmail == ""){
		errorMsg[3].innerHTML = "";
      email.style.border = "0px solid green";

	}else{
    errorMsg[3].classList.add("text-danger");
		errorMsg[3].innerHTML = "Email format is invalid";
      email.style.border = "1px solid red";
	}
}

//password validation
function checkPass(){
	var getPass = password.value.trim();
	if(getPass == ""){
		errorMsg[5].innerHTML = "";
      password.style.border = "0px solid green";

	}else if(getPass.length < 8){
    errorMsg[5].classList.add("text-danger");
	  errorMsg[5].innerHTML = "Password should not be less than 8";
      password.style.border = "1px solid red";

	}else{
      errorMsg[5].innerHTML = "";
      password.style.border = "1px solid green";
	}
}

//password mismatch
function matchPass(){
  var getPass = password.value.trim();
	var getConfirmPass = confirmPassword.value.trim();

	if(getConfirmPass == ""){
		errorMsg[6].innerHTML = "";

	}else if(getPass != getConfirmPass){
    errorMsg[6].classList.add("text-danger");
		errorMsg[6].innerHTML = "Password Mismatch";
      confirmPassword.style.border = "1px solid red";

	}else{
		 errorMsg[6].innerHTML = "";
      confirmPassword.style.border = "1px solid green";
	}
}
</script>

</html>
