<?php
session_start();
include ("db.php");
$pagename="“Your Sign Up Results"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
if(isset($_POST['firstname']))
{
	
	$fname=$_POST['firstname']; 
	$sname=$_POST['lastname']; 
	$address=$_POST['address']; 
	$pcode=$_POST['postcode']; 
	$tel=$_POST['telno']; 
	$email=$_POST['email']; 
	$password=$_POST['password']; 
	$confirmpassword=$_POST['confirmpassword']; 
}



//if(!(empty($fname)||empty($sname)||empty($address)||empty($pcode)||empty($tel)||empty($email)||empty($password)))
if(!(empty($fname)||empty($sname)||empty($address)||empty($pcode)||empty($tel)||empty($email)||empty($password)))
{
	if($password != $confirmpassword)
	{
		echo "Passwords Not Matching";
		echo "<a href=signup.php>Return to Sign Up</a>";
	}
	else
	{
		$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
		//if (preg_match($pattern, $email)
		if(preg_match($pattern, $email))
		{
			$SQL="INSERT into users (userFName,userSName,userAddress,userPostCode,userTelNo,userEmail,userPassword)VALUES('$fname','$sname','$address','$pcode','$tel','$email','$password')";
			$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error($conn));
			if(mysqli_errno($conn)== 0)
			{
				echo "Your Registration is Successful";
				echo "<a href=login.php>Return to Sign Up</a>";
			}
			else if(mysqli_errno($conn)==1062)
			{
				echo "Email is already Taken";
				echo "<a href='signup.php'>Return to Sign Up</a>";
			}
			else if(mysqli_errno($conn)==1064)
			{
				echo "Inavlid characters";
				echo "<a href=signup.php>Return to Sign Up</a>";
			}
		}
		else
		{
			echo "Email is not in the correct format";
		}
		
	}
}
else
{
	//Display "all mandatory fields need to be filled in " message and link to register page
	echo "All mandatory fields need to be filled in";
	echo "<a href=signup.php>Return to Sign Up</a>";
}	

include("footfile.html"); //include head layout
echo "</body>";
?>