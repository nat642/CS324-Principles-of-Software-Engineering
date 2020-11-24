<!DOCTYPE html>
<html>
<body>
<?php 
include_once 'lmt18.php';
include 'display.php';

#form data
$p_name=$_POST['u_name'];

$sql = "delete from user where userName = :u_name;";
$stmt = $conn->prepare($sql);

# data stored in an associative array
$data = array( 'u_name' => $u_name);

if($stmt->execute($data)){
		$rows_affected = $stmt->rowCount();
        	echo "<h2>".$rows_affected." name deleted sucessfully!</h2>";
		display("SELECT userName FROM user;");
}
else
{
 	echo "\nPDOStatement::errorInfo():\n";
	print_r($stmt->errorInfo());
}
$stmt = null;
$conn = null;

?>

</body>
</html>