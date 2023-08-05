<?php
session_start();
$_SESSION['day']=$_GET['day'];
$_SESSION['date']=$_GET['date'];
$_SESSION['month']=$_GET['month'];
$today=$_GET['today'];
$hour=$_GET['hour'];
if(isset($_SESSION['cities']))
{
 $cities=$_SESSION['cities'];
}
$date=$_SESSION['date'];
$f=0;
$con=mysqli_connect('localhost','rudranil','rudra@123');
mysqli_select_db($con,'moviebooking');
$q="select cinema_hall_id from movieandcitywise_book where cities='$cities' && date='$date' && movie_id=".$_SESSION['movie_id'];
$result = mysqli_query($con,$q);
$num=mysqli_num_rows($result);
for($i=1;$i<=$num;$i++)
{
  $row = mysqli_fetch_array($result);
  $cinemahallid['cinemahallid'.$i]=$row['cinema_hall_id'];
}
for($j=1;$j<=$num;$j++)
{
  $s="select * from cinema_hall where cinema_hall_id=".$cinemahallid['cinemahallid'.$j];
  $result1= mysqli_query($con,$s);
  $row1 = mysqli_fetch_array($result1);
  $hallname['hall_name'.$j]=$row1['cine_hall_name'];
  $time1['firstshow'.$j]=$row1['Time1'];
  $time1['hour'.$j]=$row1['Time1_hour'];
  $time2['secondshow'.$j]=$row1['Time2'];
  $time2['hour'.$j]=$row1['Time2_hour'];
  $time3['thirdshow'.$j]=$row1['Time3'];
  $time3['hour'.$j]=$row1['Time3_hour'];
}
?>
  <div class="availableDate">
  <?php
  if($num==0)
  {?>
    <div class="sorryNoComp">Sorry, No complex is available on <?php echo $_SESSION['day'].", ".$_SESSION['date']." ".$_SESSION['month']?></div>
  <?php
  }
  else
  {?>
    <div class="availableComplex">Available Complex in <?php echo $cities ?> on <?php echo $_SESSION['day'].", ".$_SESSION['date']." ".$_SESSION['month']?>
    </div>
	<?php 
	for($k=1;$k<=$num;$k++)
    {
      if(($time1['hour'.$k]!=0 && $time1['hour'.$k]>$hour) || ($time2['hour'.$k]!=0 && $time2['hour'.$k]>$hour) || 
      ($time3['hour'.$k]!=0 && $time3['hour'.$k]>$hour) || $_SESSION['date']!=$today)
        {?>
        <div class="hallDetails">
            <div class="hallName"><?php echo $hallname['hall_name'.$k];?></div>
            <div class="movieTimes">
              <?php 
               if(($time1['hour'.$k]!=0 && $time1['hour'.$k]>$hour) || $_SESSION['date']!=$today)
               {?>
        	       <a href="http://localhost/moviebookingwebsite2.0/pages/seat-booking-slot.php?time=<?php echo $time1['firstshow'.$k];?>&cinemahallname=
                   <?php echo $hallname['hall_name'.$k];?>&cinemahallid=<?php echo $cinemahallid['cinemahallid'.$k];?>" 
                   style="text-decoration:none;color:#FF0080;">
                      <div class="showTime"><?php echo $time1['firstshow'.$k];?></div>
                   </a>
               <?php
               }
               if(($time2['hour'.$k]!=0 && $time2['hour'.$k]>$hour) || $_SESSION['date']!=$today)
               {
               ?>
        	       <a href="http://localhost/moviebookingwebsite2.0/pages/seat-booking-slot.php?time=<?php echo $time2['secondshow'.$k];?>&cinemahallname=
                   <?php echo $hallname['hall_name'.$k];?>&cinemahallid=<?php echo $cinemahallid['cinemahallid'.$k];?>" 
                   style="text-decoration:none;color:#FF0080;">
                   <div class="showTime"><?php echo $time2['secondshow'.$k]; ?></div>
                   </a>
               <?php
               }
               if(($time3['hour'.$k]!=0 && $time3['hour'.$k]>$hour) || $_SESSION['date']!=$today)
               {
               ?>
        	       <a href="http://localhost/moviebookingwebsite2.0/pages/seat-booking-slot.php?time=<?php echo $time3['thirdshow'.$k];?>&cinemahallname=
                   <?php echo $hallname['hall_name'.$k];?>&cinemahallid=<?php echo $cinemahallid['cinemahallid'.$k];?>" 
                   style="text-decoration:none;color:#FF0080;">
                   <div class="showTime"><?php echo $time3['thirdshow'.$k]; ?></div>
                   </a>
               <?php
               }
               $f++;
               ?>
            </div>
        </div>
      <?php 
       }
    }
    if($f==0)
    {?>
      <div class="timeMistake">
        <div class="timesUp">Sorry,Today seat booking already closed for that time, pls select another date.</div>
      </div>
    <?php
    }
 }
 ?> 
 </div> 