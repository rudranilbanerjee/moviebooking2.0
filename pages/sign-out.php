<?php
session_start();
session_destroy();
header('location:http://localhost/moviebookingwebsite2.0/pages/Landing-Page.php');
?>