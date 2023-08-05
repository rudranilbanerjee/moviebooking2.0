<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Payment-page</title>
  <meta name="viewport", content="width=device-width,initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="http://localhost/moviebookingwebsite2.0/CSS/payment-page.css">
</head>
<body>
      <div class="payment-box">
      	<div class="border">
      		<div class="info-join">
      			<div class="box1">
                    <div class="info-item">Movie Name: <span class="decoration"><?php echo $_SESSION['movie_name']; ?></span></div>
                    <div class="info-item">Cinema Hall Name: <span class="decoration"><?php echo $_SESSION['hallname'];?></span></div>
                    <div class="info-item">Address: <div class="decoration"><?php echo $_SESSION['address'];?></div></div>
                    <div class="info-item">Date: <span class="decoration"><?php echo $_SESSION['day'];?>, <?php echo $_SESSION['date'];?> <?php echo $_SESSION['month'];?> 2022</span></div>
                    <div class="info-item">Time: <span class="decoration"><?php echo $_SESSION['time']; ?></span></div>
      		    </div>
      		    <div class="box2">
                    <div class="info-item" >Total seat: <span class="decoration"><?Php echo $_SESSION['totalseat'];?></span></div> 
                    <div class="info-item">Platinum Seat no: <span class="decoration"><?php 
                    if($_SESSION['seatnoplatinum']=="")
                    {	
                    echo "None";
                    }
                    else
                    echo $_SESSION['seatnoplatinum'];
                    ?>
                    </span></div>
                    <div class="info-item">Gold Seat no: <span class="decoration"><?php
                    if($_SESSION['seatnogold']=="") 
                    echo "None";
                    else
                    echo $_SESSION['seatnogold'];?>	
                    </span></div>
                    <div class="info-item">Silver Seat no: <span class="decoration"><?php
                    if($_SESSION['seatnosilver']=="")
                    echo "None";
                    else 
                    echo $_SESSION['seatnosilver'];?></span>
                    </div>
                    </div>
                </div>
      		<div class="client-detail">
      			<form class="log-in-form" action="http://localhost/moviebookingwebsite2.0/pages/client-booking-information-insert.php" method="GET">
      		    <input class="left" type="text" name="clientname" placeholder="Your name" required />
      		    <input class="right" type="text" name="age" placeholder="Your age" required />
      		    <input class="submitBtn"type="submit" value="Confirm to pay Rs.<?php echo $_SESSION['total_bill'];?>" style="background-color:#00FF00; width:300px; font-weight: bold; color:black; font-size:20px; font-family:Times new roman;"/>
      	    </form>
      	    </div>    
      	</div>
      </div>
</body>
</html>