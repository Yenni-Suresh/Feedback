<html>
<head>
</head>
<body>
  <?php
        session_start();
         if($_SESSION['sid']!=session_id())
             header("location:login.php");

        $link = mysqli_connect('localhost', 'root', '', 'feedback');
		// Check connection
		if (!$link) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		$query = "SELECT count(*) FROM question_bank";

		$len = mysqli_query($link, $query);
         $final=mysqli_fetch_array($len);
        for ($i = 1; $i <= $final[0]; $i++){
        	if(isset($_POST[$i])){
        		//$query = 
        		mysqli_query($link, "DELETE from question_bank where id=\"".$i."\" ");
        	}
        }

        mysqli_query($link,"alter table question_bank drop id;");
        mysqli_query($link,"alter table question_bank add id int primary key auto_increment;");
		  // depending on the checkboxes delete question using mysql
	         
		header('Location: ' . "view_MainQB.php?deletemsg=Questions deleted..");
		mysqli_close($link);
	?>
</body>
</html>