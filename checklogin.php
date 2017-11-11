<html>
<head>
</head>
<body>
  <?php
       $name=$_REQUEST['uname'];
	   $password=$_REQUEST['pwd'];
	   // Create connection
		$link = mysqli_connect('localhost', 'root', '', 'feedback');
		// Check connection
		if (!$link) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT username, password FROM login_details;";

		if ($result = mysqli_query($link, $query)) {

		    /* fetch associative array */
		    while ($row = mysqli_fetch_row($result)) {
		        if( $name==$row[0] && $password==$row[1] )
			    {
	                session_start();
	            	$_SESSION['sid']=session_id();
		    		header('Location: ' . "home.php");
					$query = "SELECT dept from login_details";
		  	        $res = mysqli_query($link, $query);
		  	        $row=mysqli_fetch_row($res);
		  	        $_SESSION['dep']=$row[0];
	            }
		    	else 
		      	{
		        	header('Location: ' . "login.php?msg=Wrong+Username+or+Password.");
				}
			}
		}
		mysqli_close($link);
	?>
</body>
</html>