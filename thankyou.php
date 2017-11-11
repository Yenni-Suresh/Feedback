<html>
<head>
<title>Thank You-Feedback Online</title>
     <link rel='icon' type='image/jpg' href='feedback_icon.jpg'>
  <header>
  <center>
	 <img src='logo.jpg' width='500' height='80' style='border-radius:2px;'/> <br>
	 <font color='#f1f1f1'  size='5' style='cursor:default;' >Online Feedback Application </font>
	  <?php
	  $link = mysqli_connect('localhost', 'root', '', 'feedback');
		if (!$link) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT dept from login_details";
		  	        $res = mysqli_query($link, $query);
		  	        $row=mysqli_fetch_row($res);
		  	        $dep=$row[0];
	  echo "<font color='#f1f1f1'  size='4' style='cursor:default;' > ( $dep )</font><br>";
	  ?>
	  </center>
	</header>
  <link rel="StyleSheet" type="text/css" href="mystyle.css">
</head>
<body>
	<div class='dis' >
       <?php
	        session_start();
            if($_SESSION['sid']!=session_id() )
			{
			     header("location:thankyou.php");
			}
	         $query="select year,section from temp;";
             $res = mysqli_query($link, $query);
             while(list($yr,$se)=mysqli_fetch_row($res))
            {
              $year=$yr;
              $sec=$se;
            }
	         echo "<font size='4' color='#f1f1f1' style='cursor:default;' >$year Year - Sec: $sec</font>";
	       ?>
	</div>
<center><br><br>
       <?php 
	         $m = isset($_GET['msg']) ?  $_GET['msg']  : "";
			 if($m=='Updated..')
				  echo "<font style='cursor:default;'>  $m </font>"; 
	         else echo "<form name='done' method='post' action='store_other_comment.php'  >
	             <textarea name='area' placeholder='Any comment related to Department?'
			       style=' border-width: 2px;
                     padding: 5px;
					 border-color: #780000;
					 border-radius: 3px;
                     font-size: 15px;
                     width: 650px;
                     height: 50px; ' ></textarea><br><br><br>
		<input type='submit' name='user_sub' style='height:30px; width:80px; cursor:pointer; font-weight:bold; color:#780000; ' /> </form>";
		?><br><br>
        <p style='cursor:default;'><font size='6' >Feedback Completed</font><br><br><br><font size="5" >Thank You</font><br><br><br></p><br><br>
     </center>
	 <footer style='background-color:#006699;
        padding:5px;
        width:98.5%;
        height:14px;
        bottom:10px;
        position:fixed;
        box-shadow:0px 0px 8px black;
        border-top: 2px solid #f1f1f1;
        left:5px;'>
<font color='#f1f1f1' style='float:right; font-size:15px; cursor:default;'>Yenni Suresh & Uday Koushik @Copyrights</font>
</footer>
</body>
</html>