<?php

$con = mysqli_connect("127.0.0.1", "root", "", "recon_fw"); 
if(mysqli_connect_errno()) 
{
	echo "Failed to connect: " . mysqli_connect_errno();
}
else{
	echo "connection done";
}

?>