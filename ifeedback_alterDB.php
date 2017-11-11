<html>
<head>
</head>
<body >
  <?php
         session_start();
         if($_SESSION['sid']!=session_id())
             header("location:login.php");
		 // get values of check boxes and perform selecting nd deselecting question here for individual quesion bank
		 $link = mysqli_connect('localhost', 'root', '', 'feedback');
		// Check connection
		if (!$link) {
    		die("Connection failed: " . mysqli_connect_error());
		}
		mysqli_query($link, $query);

		$query = "SELECT count(*) FROM question_bank";

		$result = mysqli_query($link, $query);
         $len=mysqli_fetch_array($result);
        for ($i = 1; $i <= $len[0]; $i++){
        	if(isset($_POST[$i]))
        		mysqli_query($link, "update question_bank set indi='y' where id=\"".$i."\" ");
			else mysqli_query($link, "update question_bank set indi='n' where id=\"".$i."\" ");
        	}
       
		header('Location: ' . "view_individualQB.php?altermsg=Questions altered...");
		mysqli_close($link);
       ?>

</body>
</html>