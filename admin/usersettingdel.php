<?php


include ('db.php');

			
			$id =$_GET['id'];		
			$newsql ="DELETE FROM `user` WHERE IDUSER ='$id' ";
			if(mysqli_query($con,$newsql))
				{
				echo' <script language="javascript" type="text/javascript"> alert("User name and password Added") </script>';
							
						
				}
			header("Location: usersetting.php");
		
?>


