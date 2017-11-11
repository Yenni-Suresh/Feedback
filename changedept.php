<?php
         session_start();
         if($_SESSION['sid']!=session_id())
             header("location:login.php");
       
		 // Create connection
          $link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
	    $d=$_POST['department'];
		$query="update login_details set dept=\"".$d."\" where id=1 ";
		mysqli_query($link,$query);
		Header("location:decide_section.php?msg=( Logout to see change ) Updated..");
		mysqli_close();
?>