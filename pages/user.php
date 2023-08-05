<?php
 $con = mysqli_connect('localhost','rudranil','rudra@123');
 mysqli_select_db($con,'moviebooking');
 $phone_no=$_GET['phoneno'];
if(isset($_GET['phoneno']))
{
  $a="select phone_no from user where phone_no='$phone_no'";
  $result=mysqli_query($con,$a);
  $r=mysqli_num_rows($result);
 } 
 if($r>0)
  {
   echo 1; 
  }
 else
  echo 0;

?>
