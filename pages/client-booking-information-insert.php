<?php
session_start();
$clientname=$_GET['clientname'];
$age=$_GET['age'];
$date=$_SESSION['day'].",".$_SESSION['date']." ".$_SESSION['month'];
$movie_name=$_SESSION['movie_name'];
$cinemahallname=$_SESSION['hallname'];
$time=$_SESSION['time'];
$totalseat=$_SESSION['totalseat'];
$platinumseatno= $_SESSION['seatnoplatinum'];
$goldseatno=$_SESSION['seatnogold'];
$silverseatno=$_SESSION['seatnosilver'];
$total_bill=$_SESSION['total_bill'];
$userid=$_SESSION['userid'];
echo $userid;
$con=mysqli_connect('localhost','rudranil','rudra@123');
mysqli_select_db($con,'moviebooking');
$q="insert into booking_information (client_name,movie_name,cinema_hall_name,date,time,total_seat,platinum_seat_no,gold_seat_no,silver_seat_no,total_payment,phone_no) values ('$clientname','$movie_name','$cinemahallname','$date','$time','$totalseat','$platinumseatno','$goldseatno','$silverseatno','$total_bill','$userid')";
$i = mysqli_query($con,$q);
mysqli_close($con);
header('location:http://localhost/moviebookingwebsite2.0/pages/booking-confirm-page.php');
?>
