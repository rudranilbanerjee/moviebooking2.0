<?php
session_start();
if(!isset($_SESSION['username']))
{
    header('location:http://localhost/moviebookingwebsite2.0/log-in-pagefor-purchase-history.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta content="width=device-width, initial-scale=1" name="viewport" />
	<title>booking-history</title>
	<link href="http://fonts.cdnfonts.com/css/jenna-sue" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="http://localhost/moviebookingwebsite2.0/CSS/Home-Page.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="http://localhost/moviebookingwebsite2.0/CSS/purchase-history.css">
</head>
<body>
    <!--================================ Pop-Up =============================-->
    <div class="pop-up">
        <div class="headSearch">
            <form action="http://localhost/moviebookingwebsite2.0/pages/city-wise-cinema-hall.php" method="GET" 
            id="mysearch">
                <div>
                    <i class="fa fa-search searchIcon"></i>
                    <input style="font-size:15px;" oninput="fetchcities(this.value)" class="search-bar" type="text" onkeyup="validation(this.value)" 
                        name="cityname" placeholder="Search for your city">
                    <button id="submitbtn" style="display: none;" disabled="disabled">submit</button>
                    <!-- List of suggested cities when user search something-->
                    <div class="dropdown" id="cities">
                        <!-- <a href="**">Hello World</a>   -->
                    </div>
                </div>
            </form>
            <div id="times"><button id="close">&times;</button></div>
        </div>
        <div class="popularCities">Popular Cities</div>
        <div class="block">
            <div class="stateIcon">
                <a href="http://localhost/moviebookingwebsite2.0/pages/city-wise-cinema-hall.php?cityname=Delhi">
                    <img class="state" src="../city-icon/delhi-icon.png" >
                    <div>Delhi</div>
                </a>
            </div>
            <div class="stateIcon">
                <a href="http://localhost/moviebookingwebsite2.0/pages/city-wise-cinema-hall.php?cityname=Mumbai">
                    <img class="state" src="../city-icon/mumbai-icon.png" >
                    <div>Mumbai</div>
                </a>
            </div>
            <div class="stateIcon">
                <a href="http://localhost/moviebookingwebsite2.0/pages/city-wise-cinema-hall.php?cityname=Bengaluru">
                    <img class="state" src="../city-icon/bengaluru-icon.png" >
                    <div>Bengaluru</div>
                </a>
            </div>
            <div class="stateIcon">
                <a href="http://localhost/moviebookingwebsite2.0/pages/city-wise-cinema-hall.php?cityname=Kolkata">
                    <img class="state" src="../city-icon/kolkata-icon.jpg" >
                    <div>Kolkata</div>
                </a>
            </div>
            <div class="stateIcon">
                <a href="http://localhost/moviebookingwebsite2.0/pages/city-wise-cinema-hall.php?cityname=Hydrabad">
                    <img class="state" src="../city-icon/hydrabad-icon.png" >
                    <div>Hyderabad</div>
                </a>
            </div>
            <div class="stateIcon">
                <a href="http://localhost/moviebookingwebsite2.0/pages/city-wise-cinema-hall.php?cityname=Chandigarh">
                    <img class="state" src="../city-icon/chandigarh-icon.png" >
                    <div>Chandigarh</div>
                </a>
            </div>
            <div class="stateIcon">
                <a href="http://localhost/moviebookingwebsite2.0/pages/city-wise-cinema-hall.php?cityname=Chennai">
                    <img class="state" src="../city-icon/chennai-icon.png" >
                    <div>Chennai</div>
                </a>
            </div>
            <div class="stateIcon">
                <a href="http://localhost/moviebookingwebsite2.0/pages/city-wise-cinema-hall.php?cityname=Ahmedabad">
                    <img class="state" src="../city-icon/ahmedabad-icon.png" >
                    <div>ahmedabad</div>
                </a>
            </div>
            <div class="stateIcon">
                <a href="http://localhost/moviebookingwebsite2.0/pages/city-wise-cinema-hall.php?cityname=Kochi">
                    <img class="state" src="../city-icon/kochi-icon.png" >
                    <div>Kochi</div>
                </a>
            </div>
        </div>
        <div style="margin-bottom:15px;"><a class="viewAllCities" href="**">View all cities</a></div>
    </div>    

    <!-- ==============================MenuBar=================================== -->
    <div class="menu-bar" id="menu">
        <div class="first-content" id="menu1">
            <div class="reflection onAccess">
                <div><i style="color:#FF0080; font-size:30px;" class="fa fa-user-circle userIcon" aria-hidden="true"></i></div>
                Hey, 
                <span style="color:#FF0080; font-size:18px; "><?php echo $_SESSION['username'];?></span>
            </div>    
            <div class="editProfile">Edit Profile <i class="fa fa-angle-right"></i></div>
        </div>

        <div class="notification" id="notibar">
            <div class="back-button" id="submenu">
                <i style="color:#FF0080; font-size:16px; " class="fa fa-angle-left"></i> Back
            </div>
        </div>
        <div style="display:none;" class="notification" id="walletbar">
            <div class="back-button">
                <i style="color:#FF0080; font-size:16px; " class="fa fa-angle-left"></i> Back
                <span class="wallet">Wallet</span>
            </div>
            <div class="walletSection">
                <img src="http://localhost/moviebookingwebsite2.0/wallet-logo.jpg" width="90" height="90">
                <div style="font-size:20px;" id="submenu">Total money</div>
                <div style="display:flex;margin: 10px 0;"><img style="margin-top: 10px;" src="http://localhost/moviebookingwebsite2.0/Indian-Rupee-symbol.png" width="30" height="30">
                    <div style="font-size:40px;">0.00 Rs</div>
                </div>
                <a href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php" style="text-decoration:none; color:white;">
                    <div class="addMoney"><span style="font-size:20px;font-weight:bold;color:white">Add Money</span></div>
                </a>
            </div>
        </div>
        <div style="display:none;" class="notification" id="ticketbar">
            <div class="back-button">
                <i style="color:#FF0080; font-size:16px; " class="fa fa-angle-left"></i> Back
                <span class="wallet">Your Ticket</span>
            </div>
          <?php
          $userid=$_SESSION['userid'];
          $con = mysqli_connect('localhost','rudranil','rudra@123');
          mysqli_select_db($con,'moviebooking');
          $d="select*from booking_information where phone_no='$userid'";
          $result = mysqli_query($con,$d);
          $num = mysqli_num_rows($result);
          if($num!=0)
          {
           for($i=1;$i<=$num;$i++)
           {
             $row=mysqli_fetch_array($result);
             $user['bookingname'.$i]=$row['client_name'];
             $user['moviename'.$i]=$row['movie_name'];
             $user['cinemahallname'.$i]=$row['cinema_hall_name'];
             $user['date'.$i]=$row['date'];
             $user['time'.$i]=$row['time'];
             $user['platinumseat'.$i]=$row['platinum_seat_no'];
             $user['goldseat'.$i]=$row['gold_seat_no'];
             $user['silverseat'.$i]=$row['silver_seat_no'];
             $user['seatno']=$user['platinumseat'.$i].",".$user['goldseat'.$i].",".$user['silverseat'.$i];
             $user['ticketid'.$i]=$row['ticket_id'];?>
            <div class="ticketSection">
                <div class="ticketdesign">
                 <div class="ticket-logo"><img src="/movie-poster/ticket.jfif" width="100%" height="100%"></div>
                 <div class="ticketDetails">
                    <div><span style="color:yellow;font-size:16px;">Ticket Id:</span> 567896<?php echo $user['ticketid'.$i];?></div>
                    <div><span style="color:yellow;font-size:16px;">Movie Name:</span> Tare zameen par<?php echo $user['moviename'.$i];?></div>
                    <div><span style="color:yellow;font-size:16px;">Multiplex:</span> ghuf vghju kamal<?php echo $user['cinemahallname'.$i];?></div>
                    <div><span style="color:yellow;font-size:16px;">Date:</span> 78/89/65<?php echo $user['date'.$i];?></div>
                    <div><span style="color:yellow;font-size:16px;">Time:</span> 8:09<?php echo $user['time'.$i];?></div>
                    <div><span style="color:yellow;font-size:16px;">Seat No:</span> 89<?php echo $user['seatno'];?></div>
                 </div>
                </div>
                <a href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php" style="text-decoration:none; color:white;">
                    <div class="getTicket">
                    <span style="font-size:20px;color:white">Get your Ticket</span>
                    </div>
                </a>
            </div>
          <?php    
           }
          }
          else
          {?>
            <div>sorry,You have not purchase any tickets!!</div>
          <?php    
          }
          ?>
        </div>
        <div class="navigation-bar"> 
            <div class="next-content" id="notify">
                <div>
                <i style="color:#FF0080; font-size:16px; " class="fa fa-bell-o"></i> Notifications <i class="fa fa-angle-right"></i>
                </div>
            </div>

            <div class="next-content" id="walletfy">
                <div style="font-size: 17px;margin-top:5px; ">
                <i style="color:#FF0080; font-size:16px; " class="fa fa-google-wallet"></i> Wallet <i class="fa fa-angle-right"></i>
                </div>
            </div>

            <div class="next-content" id="ticketfy">
                <div style="font-size: 17px;margin-top:5px; ">
                <i style="color:#FF0080; font-size:16px; " class="fa fa-ticket"></i> Tickets <i class="fa fa-angle-right"></i>
                </div>
            </div>

            <div class="next-content">
                <a href="http://localhost/moviebookingwebsite2.0/purchase-history.php" style="text-decoration:none;">
                    <div style="color:black;">
                        <i style="color:#FF0080; font-size:16px;" class="fa fa-money"></i>
                        <span>Purchase History</span>
                        <i class="fa fa-angle-right"></i>
                    </div>       
                </a>
            </div>

            <div class="next-content">
                <div style="font-size: 17px;margin-top:5px; ">
                <i style="color:#FF0080; font-size:16px; "class="fa fa-comments-o"></i> Help & Support <i class="fa fa-angle-right"></i>
                </div>
            </div>

            <div class="next-content" id="account">
                <div id="subMenuOpen" style="font-size: 17px;margin-top:5px;">
                    <i style="color:#FF0080; font-size:16px; "class="fa fa-cog"></i> Account & Setting <i class="fa fa-angle-right"></i>
                </div>
            </div>

            <div id="subMenuBar" class="sub-menu">
                <div class="sub-menu1">My Account</div>
                <div class="sub-menu1">Saved Payment Method</div>
            </div>

            <div class="next-content">
                <div style="font-size: 17px;margin-top:5px; ">
                <i style="color:#FF0080; font-size:16px; "class="fa fa-shopping-bag"></i> Reward <i class="fa fa-angle-right"></i>
                </div>
            </div>
        </div>
        <div class="signOutSec">   
            <a style="text-decoration: none;" href="http://localhost/moviebookingwebsite2.0/pages/sign-out.php">
                <div class="sign-out">
                    <span>Sign Out</span>
                </div>
            </a>
        </div>
    </div>

    <!--================================= Header ================================== -->


<header> 
    <!-- =========================================Navbar design========================================== -->
    <div class="first-header">
    	<div class="company-logo">
            <img src="logo-of-company.jpg" width="250" height="70">
        </div>
    	<div class="searchBox">
           <i class="fa fa-search searchIcon1"></i>
           <input class="searchBar1" type="text" name="searched_city_name"  
           placeholder="Search for Movies,Events,Plays,Sports and Activities"/>
        </div>
      <?php
      if(isset($_SESSION['cities']))
      {?>
        <div class="city-selector" onclick="popupload()">
            <div style="text-transform:capitalize;" id="change-city"> <?php echo $_SESSION['cities']; ?></div>
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </div>
      <?php
      }
      else
      {
      ?>
        <div class="city-selector">
            <div style="text-transform:capitalize;" id="change-city"> Select your city </div>
            <i class="fa fa-chevron-down" aria-hidden="true"></i>
        </div>
      <?php
      }
      ?>  
    	<?php
      if(isset($_SESSION['username']))
      {?>
         <div>
            <button onclick="menubar()" class="username" style="font-weight:20px;"><?php echo $_SESSION['username'];?></button>
         </div>
      <?php   
      }
      else
      {?>
        <div>
            <a href="http://localhost/moviebookingwebsite2.0/pages/log-in-page.php">
               <button class="sign-in">Sign in</button>
            </a>
        </div>
      <?php
      }
      ?>  	
    	<div class="menuSign">
            <i id="menuBtn" style="font-size: 25px;" class="fa fa-bars menuIcon" aria-hidden="true"></i>
        </div>
    </div>
</header>


    <!-- ========================Second Navbar================================ -->

<nav>
    <div class="second-header">
    	<div><a class="navi" href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php">Movies</a></div>
    	<div><a class="navi" href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php">Stream</a></div>
    	<div><a class="navi" href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php">Event</a></div>
    	<div><a class="navi" href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php">Plays</a></div>
        <div><a class="navi" href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php">Sports</a></div>
        <div><a class="navi" href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php">Activities</a></div>
        <div><a class="navi" href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php">Buzz</a></div>
        <div><a class="xyz navi" href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php">ListYourShow</a></div>
        <div><a class="navi" href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php">Corporates</a></div>
        <div><a class="navi" href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php">Offers</a></div>
        <div><a class="navi" href="http://localhost/moviebookingwebsite2.0/pages/under-construction.php">Gift cards</a></div>
    </div>
</nav>

<section>
    <div class="purchaseHeading">
        <div class="pHeading">Purchase History</div>  
    </div>
    <?php
    $userid=$_SESSION['userid'];
    $con = mysqli_connect('localhost','rudranil','rudra@123');
    mysqli_select_db($con,'moviebooking');
    $d="select*from booking_information where phone_no='$userid'";
    $result = mysqli_query($con,$d);
    $num = mysqli_num_rows($result);
    if($num!=0)
    {
      for($i=1;$i<=$num;$i++)
      {
    	$row=mysqli_fetch_array($result);
    	$user['bookingname'.$i]=$row['client_name'];
    	$user['moviename'.$i]=$row['movie_name'];
    	$user['cinemahallname'.$i]=$row['cinema_hall_name'];
    	$user['date'.$i]=$row['date'];
    	$user['time'.$i]=$row['time'];
    	$user['totalseat'.$i]=$row['total_seat'];
    	$user['platinumseat'.$i]=$row['platinum_seat_no'];
    	$user['goldseat'.$i]=$row['gold_seat_no'];
    	$user['silverseat'.$i]=$row['silver_seat_no'];
    	$user['totalpayment'.$i]=$row['total_payment'];
    	$user['ticketid'.$i]=$row['ticket_id'];
      }?>
      <div class="tabHead">
      <table border="1px" cellspacing="0px" width="100%">
      	<tr class="table-header">
      		<th>S.No</th>
      		<th>Ticket Id</th>
      		<th>Booked By</th>
      		<th>Movie Name</th>
      		<th>Movie Hall Name</th>
      		<th>Date</th>
      		<th>Time</th>
      		<th>Total Seat</th>
      		<th>Platinum Seat No</th>
      		<th>Golden Seat No</th>
      		<th>Silver Seat No</th>
      		<th>Total Cost</th>
      	</tr>
      	<?php
      	for($j=1;$j<=$num;$j++)
      	{?>
            <tr class="table-data">
            	<td align="center"><?php echo $j;?></td>
            	<td align="center"><?php echo $user['ticketid'.$j];?></td>
            	<td align="center"><?php echo $user['bookingname'.$j];?></td>
            	<td align="center"><?php echo $user['moviename'.$j];?></td>
            	<td align="center"><?php echo $user['cinemahallname'.$j];?></td>
            	<td align="center"><?php echo $user['date'.$j];?></td>
            	<td align="center"><?php echo $user['time'.$j];?></td>
            	<td align="center"><?php echo $user['totalseat'.$j];?></td>
            	<td align="center"><?php echo $user['platinumseat'.$j];?></td>
            	<td align="center"><?php echo $user['goldseat'.$j]?></td>
            	<td align="center"><?php echo $user['silverseat'.$j];?></td>
            	<td align="center"><?php echo $user['totalpayment'.$j];?></td>
            </tr>
        <?php    
      	}
      	?>
      </table>
      </div>
    <?php  
    }  
    else
    {
    ?>
      <div class="emptyMessage">
    	  <div class="message">You don't seem to have any bookings done in the past</div>
      </div>
    <?php
    }
    ?>
</section>


    <!-- ============================Footer section============================ -->

    <footer>
        <div class="ending">
            <div class="headBar" >
                <div class="leftHorizontalLine"></div> 
                <div class="logoName">Showpura</div> 
                <div class="rightHorizontalLine"></div>
            </div>
            <div class="socialIcon">
            <div ><i style="font-size:35px;"class="fa fa-facebook-official official-logo" aria-hidden="true"></i></div>
            <div ><i style="font-size:35px;"class="fa fa-twitter-square official-logo" aria-hidden="true"></i></div>
            <div ><i style="font-size:35px;"class="fa fa-instagram official-logo" aria-hidden="true"></i></div>
            <div ><i style="font-size:35px;"class="fa fa-pinterest-square official-logo" aria-hidden="true"></i></div>
            <div ><i style="font-size:35px;"class="fa fa-youtube-play official-logo" aria-hidden="true"></i></div>
            <div ><i style="font-size:35px;"class="fa fa-linkedin-square official-logo" aria-hidden="true"></i></div>
            </div>
            <p class="copyrightStatement">
            <span>Copyright 2022 © Rudranil_Banerjee Entertainment Pvt. Ltd. All Rights Reserved.</span></br>
            <span>The content and images used on this site are copyright protected and copyrights vests with the respective owners. The usage of the content and images on this website is intended to promote the works and no</br> 
            <span>endorsement of the artist shall be implied.  Unauthorized use is prohibited and punishable by law.</span>
            </p>
        </div>
    </footer>

    <script src="http://localhost/moviebookingwebsite2.0/Javascript/Home-Page.js"></script>
 </body>
</html>    