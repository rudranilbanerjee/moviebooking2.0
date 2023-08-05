<?php
session_start();
$_SESSION['hallname']=$_GET['cinemahallname'];
$_SESSION['time']=$_GET['time'];
$_SESSION['cinemahallid']=$_GET['cinemahallid'];
$date=$_SESSION['day'].",".$_SESSION['date']." ".$_SESSION['month'];
$hallname=$_SESSION['hallname'];
$movie_name=$_SESSION['movie_name'];
$time=$_SESSION['time'];
$con=mysqli_connect('localhost','rudranil','rudra@123');
mysqli_select_db($con,'moviebooking');
$q="select*from cinema_hall where cinema_hall_id=".$_SESSION['cinemahallid'];
$result = mysqli_query($con,$q);
$row = mysqli_fetch_array($result);
$platinum=$row['ticket_price_balcony'];
$gold=$row['ticket_price_middle'];
$silver=$row['ticket_price_screen'];
$_SESSION['address']=$row['Address'];
$m="select*from booking_information where cinema_hall_name='$hallname' && movie_name='$movie_name' && time='$time' && date='$date'";
$result1=mysqli_query($con,$m);
$num=mysqli_num_rows($result1);
for($i=1;$i<=$num;$i++)
{
	$row1=mysqli_fetch_array($result1);
	$bookedp['platiseat'.$i]=$row1['platinum_seat_no'];
	$bookedg['goldseat'.$i]=$row1['gold_seat_no'];
	$bookeds['silverseat'.$i]=$row1['silver_seat_no'];
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/moviebookingwebsite2.0/CSS/seat-booking-slot.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body id="new-page">
	<h3></h3>
<div class="first-header">
	<div class="showDetails">
	    <a class="backSign" href="http://localhost/moviebookingwebsite2.0/movie-booking-page.php?movieid=<?php echo $_SESSION['movie_id'];?>"><i class=" fa fa-chevron-left" style="color:#FF0080;margin-top:10px; font-size:20px;"></i></a>
	    <div class="movie-name"><?php echo $_SESSION['movie_name'];?></div>
	    <div class="hall-name"><?php echo $_SESSION['hallname'];?> | <?php echo $_SESSION['day'];?>, <?php echo $_SESSION['date'];?> <?php echo $_SESSION['month'];?>, <?php echo $_SESSION['time'];?></div>
    </div>
    <div class="no-of-seat-choice" id="select-seats">Select</div>   
</div>
<div class="seat-box" id="mybtn">
	<div class="showcase">
		<div class="connect">
			<div class="seat"></div>
			<div>Available</div>
		</div>
		<div class="connect">
			<div class="seat selected"></div>
			<div>Selected</div>
		</div>
		<div class="connect">
			<div class="seat occupied"></div>
			<div>Sold</div>
		</div>
	</div>
	<div class="seat-variation-platinum">Platinum-Rs. <?php echo $platinum ?>.00</div>
	<div id="platinum">
    </div>
	<div class="seat-variation-gold">Gold-Rs. <?php echo $gold; ?>.00</div>
	<div id="gold">
    </div> 
	<div class="seat-variation-gold">Silver-Rs. <?php echo $silver; ?>.00</div>
	<div id="silver">
	</div>
	<div class="base"> 
	<div class="screen"></div>
    </div>
	<div class="notation">All eyes this way please!</div>
</div>
<div class="total-bill-box" id="total-bill-box">
	<div onclick="billpayment()" class="total-pay">Pay Rs.<span id="total-bill">100</span>.00</div>
</div>

<script src="http://localhost/moviebookingwebsite2.0/Javascript/seat-booking-slot.js"></script>

<script>
		<?php 
		for($i=1;$i<=$num;$i++)
		{
			if($bookedp['platiseat'.$i]!="")
			{?>
		      let ansplatinum<?php echo $i;?>="<?php echo $bookedp['platiseat'.$i];?>";
		      let ansp<?php echo $i;?>=ansplatinum<?php echo $i;?>.split(",");
            <?php
		    }
		    else
		    {?>
		      let ansp<?php echo $i;?>=0;	
            <?php
		    }
		    if($bookedg['goldseat'.$i]!="")
		    {
		    ?>
		      let ansgold<?php echo $i;?>="<?php echo $bookedg['goldseat'.$i];?>";
		      let ansg<?php echo $i;?>=ansgold<?php echo $i;?>.split(",");
		    <?php
		    }
            else
            {?>
              let ansg<?php echo $i;?>=0;	
            <?php
            }
		    if($bookeds['silverseat'.$i]!="")
		    {
		    ?>
		      let anssilver<?php echo $i;?>="<?php echo $bookeds['silverseat'.$i];?>";
		      let anss<?php echo $i;?>=anssilver<?php echo $i;?>.split(",");
		    <?php
		    }
            else
            {
            ?>
              let anss<?php echo $i;?>=0;
            <?php
            }
		    ?>
		<?php
		}
		?>
		$(document).ready(function(){
			<?php
		   for($A=1;$A<=$num;$A++)
		   {?>	
		   	 var platinum<?php echo $A;?>=ansp<?php echo $A;?>.length;
		   	 var goldnum<?php echo $A;?>=ansg<?php echo $A;?>.length;
		   	 var silvernum<?php echo $A;?>=anss<?php echo $A;?>.length;
		   	 for(var h=0;h<=silvernum<?php echo $A;?>;h++)
             {
             	$('#'+anss<?php echo $A;?>[h]).addClass("occupied");
             }
		     for(var f=0;f<=platinum<?php echo $A;?>;f++)
		     {
                $('#'+ansp<?php echo $A;?>[f]).addClass("occupied");
             }
             for(var g=0;g<=goldnum<?php echo $A;?>;g++)
             {
             	$('#'+ansg<?php echo $A;?>[g]).addClass("occupied");
             }
           <?php
           }
           ?>
		});
		var platinum_ticket=<?php echo $platinum; ?>;
        var gold_ticket=<?php echo $gold; ?>;
        var silver_ticket=<?php echo $silver; ?>;
	</script>
</body>
</html>