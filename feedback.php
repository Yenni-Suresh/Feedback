<?php
     $link = mysqli_connect('localhost', 'root', '', 'feedback');
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
	  $query="select feed,fl from temp;";
         $res = mysqli_query($link, $query);
         while(list($fee,$fl)=mysqli_fetch_row($res))
         {
           $fs=$fee;
           $fol=$fl;
         }
		 if($fs=='1'&&$fol=='s')
		 {
			 session_start();
	            	$_SESSION['sid']=session_id();
                    $_SESSION['two']=1;
			 header('Location: ' . "user_indi_view.php");
		 }
		 else if($fs=='1'&&$fol=='l')
		 {
			 session_start();
	            	$_SESSION['sid']=session_id();
					$_SESSION['two']=2;
			 header('Location: ' . "user_indi_view_lab.php");
		 }
		 else if($fs=='2'&&$fol=='o')
		 {
			 session_start();
	            	$_SESSION['sid']=session_id();
					$_SESSION['one']=0;
					$_SESSION['two']=0;
			 header('Location: ' . "user_view_sub.php");
		 }
		 else header('Location: ' . "nofeedback.php");
?>