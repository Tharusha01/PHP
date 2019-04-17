<?php
session_start();
include ("db.php");
$pagename="Sign Up"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page
//display random text
echo '
<form action=signup_process.php method=post>
<table style="width:100%"  "border = 0">
  
  <tr >
	<td>*First Name</td>
	<td><input type="text" name="firstname" value=""></td>
  </tr>
  
   <tr >
	<td>*Last Name</td>
	<td><input type="text" name="lastname" value=""></td>
  </tr>
  
   <tr >
	<td>*Address</td>
	<td><input type="text" name="address" value=""></td>
  </tr>
  
   <tr >
	<td>*Postcode</td>
	<td><input type="text" name="postcode" value=""></td>
  </tr>
  
   <tr >
	<td>*Tel No</td>
	<td><input type="number" name="telno" value=""></td>
  </tr>
  
   <tr >
	<td>*Email Address</td>
	<td><input type="email" name="email" value=""></td>
  </tr>
  
   <tr >
	<td>*Password</td>
	<td><input type="password" name="password" value=""></td>
  </tr>
  
  <tr >
	<td>*Confirm Password</td>
	<td><input type="password" name="confirmpassword" value=""></td>
  </tr>


</table>
<p>
	<input type=submit align="right" value="Sign Up">
	<input type=reset align="right" value="Clear Form">	</p>
</form>
';
include("footfile.html"); //include head layout
echo "</body>";
?>