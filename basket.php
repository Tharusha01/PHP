<?php
//create a new cell in the basket session array. Index this cell with the new product id.
//Inside the cell store the required product quantity
session_start();
include ("db.php");
$pagename="Smart Basket"; //Create and populate a variable called $pagename
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>"; //Call in stylesheet
echo "<title>".$pagename."</title>"; //display name of the page as window title
echo "<body>";
include ("headfile.html"); //include header layout file
include("detectlogin.php");
echo "<h4>".$pagename."</h4>"; //display name of the page on the web page

if(isset($_POST['c_prodid'])){
	$delprodid=$_POST['c_prodid'];
	unset($_SESSION['basket'][$delprodid]);
	echo "<p>1 Item Removed From The Basket</p>";
}

if(isset($_POST['h_prodid'])){
	$newprodid =$_POST['h_prodid'];
	$reququantity =$_POST['p_quantity'];
	$_SESSION['basket'][$newprodid]=$reququantity;

//echo "<p> Selected product id : ".$newprodid."</p>";
//echo "<p> Selected quantity : ".$reququantity."</p>";
//echo "<p>The doc id ".$newdocid." has been ".$_SESSION['basket'][$newdocid];
echo "<p>1 item added to the basket";
}else{
 echo "<p>Current Basket Unchanged</p>"; 
}

echo "<table style='width:100%'>
  <tr >
    <th>Product Name</th>
    <th>Price</th> 
    <th>Selected Quantity</th>
	<th>Subtotal</th>
	<th></th>
  </tr>";
  if(isset($_SESSION['basket'])){
	  
	 $total=0; 
	   foreach($_SESSION['basket'] as $index => $value){
		    $SQL="select prodName,prodPrice from Product WHERE prodId =".$index;
			$exeSQL=mysqli_query($conn, $SQL) or die (mysqli_error());
			$arrayp=mysqli_fetch_array($exeSQL);
			$subtotal=$arrayp['prodPrice'] * $value;
			$total+=$subtotal;

			echo " <tr>
				<td>".$arrayp['prodName']."</td>
				<td>".$arrayp['prodPrice']."</td>
				<td>".$value."</td>
				<td>".$subtotal."</td>
				<td>
				<form action=basket.php method=post>
				<input type=hidden name=c_prodid value=".$index.">
				<input type=submit value='REMOVE'>
				</form>
				</td>
			</tr>";
	   }
	   echo "
	  <tr>
	  <td colspan='3' >Total</td>
	  <td>".$total."</td>
	  <td></td>
	  </tr>";
	   
  }else{
	  echo"
	  <tr>
	  <td colspan='4'>
	  Please add to basket
	  </td>
	  </tr>";
  }
  
  
echo "</table>";

echo "<p><a href=clearbasket.php>Clear Basket</a></p>";

//echo "<a href=clearbasket.php>Clear Basket</a>";
	if(isset($_SESSION['userid']))
	{
		echo "<p>Done shopping? </p><a href='checkout.php'>Check Out</a></p>";
	}
	else
	{
		echo "<p>New to Hometeq? <a href='signup.php'>Sign In</a></p>";
		echo "<p>Already a Customer? <a href='login.php'>Log In</a></p>";
	}

include("footfile.html"); //include head layout
echo "</body>";
?>