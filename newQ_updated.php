<html>
<head>
</head>
<body>
  <?php
        session_start();
         if($_SESSION['sid']!=session_id())
             header("location:login.php");

         $ques=$_POST['ques'];
         $op1=$_POST['option1'];
         $op2=$_POST['option2'];
         $op3=$_POST['option3'];
         $op4=$_POST['option4'];
		  // add new question to database here..
         // Create connection
          $link = mysqli_connect('localhost', 'root', '', 'feedback');
          // Check connection
          if (!$link) {
              die("Connection failed: " . mysqli_connect_error());
          }
          $query = "insert into question_bank(question,option1,option2,option3,option4,status) values (\"".$ques."\",\"".$op1."\",\"".$op2."\",\"".$op3."\",\"".$op4."\",\"".$_POST['status']."\")";
          mysqli_query($link, $query);
		  mysqli_query($link,"alter table question_bank drop id;");
        mysqli_query($link,"alter table question_bank add id int primary key auto_increment;");
            mysqli_close($link);
		header('Location: ' . "view_MainQB.php?addmsg=Question added..");
			 
	?>
</body>
</html>