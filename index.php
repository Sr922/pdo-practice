<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);

$servername = "sql.njit.edu";
$username = "sr922";
$password = "EasV4ALf";

try {
	// Create connection
	$conn = new PDO('mysql:host=sql.njit.edu;dbname=sr922', $username, $password);
	echo "Connected successfully" . "<br/>";
	
	$sql = $conn->query('Select * from accounts where id < 6');
	
	echo "Number of records in the result : " . $sql->rowCount() . "<br/>";
	
	if($sql->rowCount() > 0){
	?>
	<table border="0">
	   <tr COLSPAN=2 BGCOLOR="#55ff00">
	      <th>ID</th>
	      <th>Email</th>
	      <th>First Name</th>
	      <th>Last Name</th>
	      <th>Phone</th>
	      <th>Birthday</th>
	      <th>Gender</th>
	      <th>Password</th>
	   </tr>

	<?php     
		while($row=$sql->fetch()) 
		{
		echo "<tr>".
		   "<td>".$row["id"]."</td>".
		   "<td>".$row["email"]."</td>".
		   "<td>".$row["fname"]."</td>".
		   "<td>".$row["lname"]."</td>".
		   "<td>".$row["phone"]."</td>".
		   "<td>".$row["birthday"]."</td>".
		   "<td>".$row["gender"]."</td>".
		   "<td>".$row["password"]."</td>".
		   "</tr>";
		}

	}
	else
	{
	    echo "No records exist" . "<br/>";
	}
	
	//Close the connection
	$conn = null;
} catch (PDOException $e) {
	print $e->getMessage() . "<br/>";
	die();
}
?>