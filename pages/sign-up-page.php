<html>
<head>
<meta content="width=device-width, initial-scale=1" name="viewport" />
<link rel="stylesheet" type="text/css" href="http://localhost/moviebookingwebsite2.0/CSS/sign-up from style.css">
<!-- Add icon library -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>


<body>
  <div class="container">
  	<div class="counterImg"><img class="image-set" src="http://localhost/moviebookingwebsite2.0/movie-poster/s6.jpg" width="100%" height="100%"></img></div>
  	<div class="form-container">
  	  <div class="form-img">
        <img src="http://localhost/moviebookingwebsite2.0/movie-poster/logo-of-company.jpg" width="100" height="40">
      </div>	
      <form action="http://localhost/moviebookingwebsite2.0/pages/new-user-homepage.php" method="post" class="form-box">

        <div class="input-box">
            <div class="lock"><i class="fa fa-user" aria-hidden="true" style="font-size:20px;"></i></div>
            <input class="text-name" type="text" placeholder="Name" name="username" oninput="usernamevalidation(this.value)" id="username" 
            onkeyup="enable()" required/>
            <div class="correct" id="validu">
              <i style="color:white;"class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="incorrect" id="invalidu">
             <i style="color:white;" class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
        <div class="validSyntax" id="validusername"></div>


        <div class="input-box">
            <div class="lock"><i class="fa fa-mobile" style="font-size:27px;"></i></div>
            <input class="text-name" type="text" placeholder="Phone Number" id="phoneNo" name="phone_no" oninput="uservalidation(this.value)" 
            onkeyup="enable()" required/>
            <span style="display:none;" id="addvalue"></span>
            <div class="correct" id="validm">
               <i style="color:white;"class="fa fa-check" aria-hidden="true"></i>
            </div>
            <div class="incorrect" id="invalidm">
               <i style="color:white;" class="fa fa-times" aria-hidden="true"></i>
            </div>
        </div>
        <div class="validSyntax" id="validmob"></div>
        
        <div class="input-box">
          <div class="lock"><i class="fa fa-envelope" style="font-size:20px;"></i></div>
          <input class="text-name" type="text" placeholder="Email Address" name="email_id" oninput="emailvalidation(this.value)" id="emailid" 
          onkeyup="enable()" required/>
          <div class="correct" id="valide">
            <i style="color:white;"class="fa fa-check" aria-hidden="true"></i>
          </div>
          <div class="incorrect" id="invalide">
            <i style="color:white;" class="fa fa-times" aria-hidden="true"></i>
          </div>
        </div>
        <div class="validSyntax" id="validemailid"></div>

        <!-- =========================EnterPassword=================== -->
        <div class="input-box">
          <div class="lock"><i class="fa fa-key" style="font-size:20px;"></i></div>
          <input class="text-name" type="Set Password" placeholder="Enter password" id="pass" name="password" 
          oninput="passwordvalidation(this.value)" onkeyup="enable()" onmouseover="instruction()" onmouseout="removeinstruc()"required/>
          <div class="correct" id="validp">
            <i style="color:white;"class="fa fa-check" aria-hidden="true"></i>
          </div>
          <div class="incorrect" id="invalidp">
            <i style="color:white;" class="fa fa-times" aria-hidden="true"></i>
          </div>
            <!-- <div style="display:none;" id="disclaimer">
              <div style="height:40px;width:180px;position:relative;margin-left:440px;margin-top:-42px;border:solid black 2px; 
              background-color:white;display:inline-flex;padding-left:5px;padding-top:2px;">
              <div style="height:30px;width:30px;padding:5px 10px; border-radius:50%;background-color:#FF4500;">
                <i style="color:white;margin-right:10px;" class="fa fa-exclamation" aria-hidden="true"></i>
              </div>
              <span style="margin-left:5px;font-size:17px;margin-top:5px;">First fill this box !</span></div>
            </div> -->
        </div>
        <div class="validSyntax" id="validpassword"></div>
        <div class="passwordInstruction" id="message">
              <ul>
                <li style="color:green;">First letter is must be capital</li>
                <li style="color:green;">At least one lower case letter [a-z]</li>
                <li style="color:green;">At least one numeral [0-9]</li>
                <li style="color:green;">At least one symbol [!@#$%^&*]</li>
                <li style="color:green;">Minimum 10 characters</li>
              </ul>
        </div>
  

        <!-- =====================Confirm Password====================== -->
        <div class="input-box">
          <div class="lock"><i class="fa fa-lock" style="font-size:25px;"></i></div>
          <input class="text-name" type="text" placeholder="Confirm Password" id="compass" oninput="compasswordvalidation(this.value)" 
          onkeyup="enable()" required/>
          <div class="correct" id="validcp">
            <i style="color:white;"class="fa fa-check" aria-hidden="true"></i>
          </div>
          <div class="incorrect" id="invalidcp">
            <i style="color:white;" class="fa fa-times" aria-hidden="true"></i>
          </div>
        </div>
        <div class="validSyntax" id="validcompassword"></div>



        <div style="font-size:15px; margin-top:5px; margin-bottom: 12px;">
        	<label style="font-weight: bold;">By signing up, you agree to our <a style="color:black; color:#FF0080"  href="***">Terms of use</a> and <a style="color:black; color:#FF0080"  href="***"> Privacy policy</a></label>
        </div>
        <input class="signUp" style="" id="btn" type="submit" value="Sign Up" disabled="disabled"/>
      </form>
      <div class="log-in">
        <span >Already a member?</span><a style="color:red;" href="http://localhost/moviebookingwebsite2.0/pages/log-in-page.php"> LOG IN</a>
      </div>
    <div>
  </div>
  <script src="http://localhost/moviebookingwebsite2.0/Javascript/sign-up-from.js"></script>
</body>
</html>