<?php
// Create connection 
//$con = mysqli_connect("localhost", "root", "", "test");
include("connect.php");
// Check connection
if ($con->connect_error) 
	{
    	die("Failed to connect to database! " . $con->connect_error);
	} 
		else {echo "Connection success!";
}

$sql = "SELECT name, date_submitted FROM markers order by date_submitted DESC LIMIT 1";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) 
{
    // Output data of each row
    while($row = mysqli_fetch_assoc($result)) 
    {
		echo "<br> Latest submission: ". $row["name"] . " at " . $row["date_submitted"]; 
	}
		} else 
		{
    		echo "<br> Nothing submitted yet!  <br>";
		}

mysqli_close($con);
?>