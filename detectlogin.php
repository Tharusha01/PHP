<?php
if(isset($_SESSION['userid'])){
echo "<p style='float:right'>".$_SESSION['userfname']." / customer No:".$_SESSION['userid']."</p><br>";
}else{
	//echo "<p style='float:right'>not set</p>";
}

?>