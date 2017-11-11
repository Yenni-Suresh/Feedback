<?php
        session_start();
        if($_SESSION['sid']!=session_id())
            header("location:login.php");
        
        $value=$_POST['decide'];
		$_SESSION['decide']=$value;

		if($value=='fac')
	    {
	    	$temp=$_POST['faculty'];
	   	}
	    else if($value=='sub')
	    {
	    	$temp=$_POST['subject'];
	    }
	    else if($value=='lab')
	    {
	    	$temp=$_POST['faculty'];
	    }
	    $_SESSION['temp']=$temp;
		
		header('Location: ' . "particular_report.php");
?>