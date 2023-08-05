<?php
session_start();
$phone_no = $_POST['phoneno'];
$password1 = $_POST['password'];
$con = mysqli_connect('localhost','rudranil','rudra@123');
mysqli_select_db($con,'moviebooking');
$q = "select password from user where phone_no='$phone_no'";
$result = mysqli_query($con,$q);
$num = mysqli_num_rows($result);
$row = mysqli_fetch_array($result);
$a="select username from user where phone_no='$phone_no'";
$result1= mysqli_query($con,$a);
$row1 = mysqli_fetch_array($result1);
if($num==1)
{ 
  if($password1==$row['password'])
  {
   $_SESSION['username']=$row1['username'];
   $_SESSION['userid']=$phone_no;
   header('location:http://localhost/moviebookingwebsite2.0/pages/Landing-Page.php');
  }
  else
  {
?>
   <html>
   <head>
   <title></title>
   <link rel="stylesheet" type="text/css" href="log-in-page-style.css">
   </head>
   <body>
    <div class="login">
            <form class="log-in-form" action="http://localhost/moviebookingwebsite2.0/pages/validation.php" method="post">
                <input type="test" name="phoneno" placeholder="Mobile Number/Email Id" required/>
                <input type="password" name="password" placeholder="Password" required/><div style="color:white;">Password Incorrect</div>
                <div class="log-in-block"><input class="log-in-btn" type="submit" value="Log in"/></div>
            </form>
            <div class="new-user">New user? <a href="http://localhost/moviebookingwebsite2.0/pages/sign-up-page.php" style="color:white; font-size:20px;text-decoration:none;">Sign up</a></div>
        </div>
   </body>
  </html>
 <?php
  }
} 
else
{?>
  <html>
   <head>
   <title></title>
   <link rel="stylesheet" type="text/css" href="log-in-page-style.css">
   </head>
   <body>
        <div class="login">
            <form class="log-in-form" action="http://localhost/moviebookingwebsite2.0/pages/validation.php" method="post">
                <input type="test" name="phoneno" placeholder="Mobile Number/Email Id" required/><div style="color:white;">User id does not exist!</div>
                <input type="password" name="password" placeholder="Password" required/>
                <div class="log-in-block"><input class="log-in-btn" type="submit" value="Log in"/></div>
            </form>
            <div class="new-user">New user? <a href="http://localhost/moviebookingwebsite2.0/pages/sign-up-page.php" style="color:white; font-size:20px;text-decoration:none;">Sign up</a></div>
        </div>
   </body>
  </html>
<?php
}
?>